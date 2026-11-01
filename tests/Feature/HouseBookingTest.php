<?php

namespace Tests\Feature;

use App\Enums\HouseListing;
use App\Enums\Status;
use App\Http\Middleware\CheckPlanAndExpiration;
use App\Http\Middleware\Language;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\House;
use App\Models\HouseBooking;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Tests\TestCase;

class HouseBookingTest extends TestCase
{
    private int $outputBufferLevel = 0;

    protected function tearDown(): void
    {
        while (ob_get_level() > $this->outputBufferLevel) {
            ob_end_clean();
        }

        parent::tearDown();
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputBufferLevel = ob_get_level();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
        DB::purge('sqlite');
        DB::setDefaultConnection('sqlite');

        $this->withoutMiddleware([
            CheckPlanAndExpiration::class,
            Language::class,
        ]);

        $this->createSchema();
        $this->makeCompanyType('Rentals', CompanyType::RENTALS_SLUG);
    }

    public function test_owner_lists_a_house_only_on_a_rental_company_they_created(): void
    {
        $owner = $this->makeUser('owner@example.com');
        $other = $this->makeUser('other@example.com');
        $rentals = CompanyType::query()->rentals()->firstOrFail();
        $bakery = $this->makeCompanyType('Bakery', 'bakery');
        $rentalCompany = $this->makeCompany($owner, $rentals, 'North Rentals');
        $shop = $this->makeCompany($owner, $bakery, 'North Bakery');
        $foreignCompany = $this->makeCompany($other, $rentals, 'Other Rentals');

        $this->actingAs($owner)
            ->post(route('owner.houses.store'), $this->housePayload($rentalCompany, 'Sea House'))
            ->assertRedirect();

        $house = House::query()->first();
        $this->assertNotNull($house);
        $this->assertSame($rentalCompany->id, $house->company_id);
        $this->assertSame(HouseListing::RENT, $house->listing_type);
        $this->assertSame('Sea House', $house->title);

        $this->actingAs($owner)
            ->post(route('owner.houses.store'), $this->housePayload($shop, 'Bakery Flat'))
            ->assertSessionHasErrors('company_id');

        $this->actingAs($owner)
            ->post(route('owner.houses.store'), $this->housePayload($foreignCompany, 'Foreign House'))
            ->assertSessionHasErrors('company_id');

        $this->assertSame(1, House::query()->count());
    }

    public function test_guest_books_a_rental_and_overlapping_dates_are_refused(): void
    {
        $owner = $this->makeUser('owner@example.com');
        $company = $this->makeCompany($owner, CompanyType::query()->rentals()->firstOrFail(), 'Coast Rentals');
        $house = $this->makeHouse($company, HouseListing::RENT, 'Cliff House');

        $this->post(route('front.house-bookings.store', $house), [
            'name' => 'Maria Costa',
            'email' => 'maria@example.com',
            'phone' => '6900000000',
            'check_in_date' => '2026-12-01',
            'check_out_date' => '2026-12-05',
            'guests' => 3,
            'message' => 'Arriving in the evening',
        ])->assertRedirect(route('front.house.show', $house->slug))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('house_bookings', [
            'house_id' => $house->id,
            'company_id' => $company->id,
            'email' => 'maria@example.com',
            'status' => Status::PENDING,
            'listing_type' => HouseListing::RENT,
        ]);

        $this->from(route('front.house.show', $house->slug))
            ->post(route('front.house-bookings.store', $house), [
                'name' => 'Nikos',
                'email' => 'nikos@example.com',
                'check_in_date' => '2026-12-04',
                'check_out_date' => '2026-12-08',
                'guests' => 2,
            ])->assertRedirect(route('front.house.show', $house->slug))
            ->assertSessionHasErrors('availability');

        $this->post(route('front.house-bookings.store', $house), [
            'name' => 'Nikos',
            'email' => 'nikos@example.com',
            'check_in_date' => '2026-12-05',
            'check_out_date' => '2026-12-08',
            'guests' => 2,
        ])->assertSessionHasNoErrors();

        $this->assertSame(2, HouseBooking::query()->count());

        $stay = HouseBooking::query()->where('email', 'maria@example.com')->firstOrFail();
        $this->actingAs($owner)
            ->patch(route('owner.house-bookings.update', $stay), ['decision' => 'accept'])
            ->assertSessionHasNoErrors();

        $this->assertSame(Status::COMPLETED, $stay->fresh()->status);
        $this->assertSame(House::STATUS_AVAILABLE, $house->fresh()->status);
    }

    public function test_accepting_a_sale_closes_the_house_and_other_offers(): void
    {
        $owner = $this->makeUser('owner@example.com');
        $company = $this->makeCompany($owner, CompanyType::query()->rentals()->firstOrFail(), 'Harbour Homes');
        $house = $this->makeHouse($company, HouseListing::SALE, 'Stone House', 180000);

        $this->post(route('front.house-bookings.store', $house), [
            'name' => 'First Buyer',
            'email' => 'first@example.com',
            'offer_price' => 175000,
            'message' => 'Cash offer',
        ])->assertSessionHasNoErrors();

        $this->post(route('front.house-bookings.store', $house), [
            'name' => 'Second Buyer',
            'email' => 'second@example.com',
            'offer_price' => 182000,
        ])->assertSessionHasNoErrors();

        $accepted = HouseBooking::query()->where('email', 'first@example.com')->firstOrFail();

        $this->actingAs($owner)
            ->patch(route('owner.house-bookings.update', $accepted), ['decision' => 'accept'])
            ->assertSessionHasNoErrors();

        $house->refresh();
        $accepted->refresh();
        $other = HouseBooking::query()->where('email', 'second@example.com')->firstOrFail();

        $this->assertSame(Status::COMPLETED, $accepted->status);
        $this->assertSame(Status::CANCELEDBYADMIN, $other->status);
        $this->assertSame(House::STATUS_SOLD, $house->status);

        $this->from(route('front.house.show', $house->slug))
            ->post(route('front.house-bookings.store', $house), [
                'name' => 'Late Buyer',
                'email' => 'late@example.com',
                'offer_price' => 190000,
            ])->assertSessionHasErrors('availability');

        $this->get(route('front.houses', ['listing' => 'sale']))
            ->assertOk()
            ->assertDontSee('Stone House');

        $this->get(route('front.house.show', $house->slug))
            ->assertOk()
            ->assertSee('Stone House')
            ->assertSee('This house has been sold.');
    }

    public function test_company_page_and_directory_show_only_that_companys_open_houses(): void
    {
        $owner = $this->makeUser('owner@example.com');
        $type = CompanyType::query()->rentals()->firstOrFail();
        $company = $this->makeCompany($owner, $type, 'Island Rentals');
        $other = $this->makeCompany($owner, $type, 'Mountain Rentals');
        $this->makeHouse($company, HouseListing::RENT, 'Olive House');
        $this->makeHouse($other, HouseListing::SALE, 'Pine House', 90000);

        $this->get(route('front.houses'))
            ->assertOk()
            ->assertSee('Olive House')
            ->assertSee('Pine House')
            ->assertSee('Island Rentals');

        $this->get(route('front.houses', ['listing' => 'rent']))
            ->assertOk()
            ->assertSee('Olive House')
            ->assertDontSee('Pine House');

        $this->get(route('front.company', $company->slug))
            ->assertOk()
            ->assertSee('Olive House')
            ->assertDontSee('Pine House');
    }

    private function housePayload(Company $company, string $title): array
    {
        return [
            'company_id' => $company->id,
            'listing_type' => HouseListing::RENT,
            'price' => 95,
            'price_period' => House::PERIOD_NIGHT,
            'bedrooms' => 2,
            'bathrooms' => 1,
            'address' => '1 Harbour Street',
            'city' => 'Kavala',
            'active' => 1,
            'en' => [
                'title' => $title,
                'description' => $title.' description',
            ],
        ];
    }

    private function makeHouse(Company $company, string $listing, string $title, float $price = 120): House
    {
        $house = new House();
        $house->company_id = $company->id;
        $house->listing_type = $listing;
        $house->price = $price;
        $house->price_period = $listing === HouseListing::RENT ? House::PERIOD_NIGHT : null;
        $house->bedrooms = 2;
        $house->bathrooms = 1;
        $house->address = '12 Coastal Road';
        $house->city = 'Kavala';
        $house->status = House::STATUS_AVAILABLE;
        $house->active = true;
        $house->translateOrNew('en')->title = $title;
        $house->translateOrNew('en')->slug = Str::slug($title);
        $house->translateOrNew('en')->description = $title.' description';
        $house->save();

        return $house->fresh();
    }

    private function makeCompany(User $user, CompanyType $type, string $title): Company
    {
        $company = new Company();
        $company->user_id = $user->id;
        $company->company_type = $type->id;
        $company->delivery = 'No';
        $company->active = 1;
        $company->translateOrNew('en')->title = $title;
        $company->translateOrNew('en')->slug = Str::slug($title);
        $company->translateOrNew('en')->meta_description = $title;
        $company->translateOrNew('en')->meta_keywords = 'rentals';
        $company->translateOrNew('en')->manager = 'Alex';
        $company->translateOrNew('en')->description = $title.' description';
        $company->save();

        return $company->fresh();
    }

    private function makeCompanyType(string $title, string $slug): CompanyType
    {
        $type = new CompanyType();
        $type->translateOrNew('en')->title = $title;
        $type->translateOrNew('en')->slug = $slug;
        $type->save();

        return $type;
    }

    private function createSchema(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('likeable_id');
            $table->string('likeable_type');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->unsignedInteger('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->nullable();
            $table->string('fullname')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('company_types', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::create('company_type_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_type_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unique(['company_type_id', 'locale']);
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('company_type')->nullable();
            $table->string('delivery');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('company_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('manager');
            $table->longText('description')->nullable();
            $table->unique(['company_id', 'locale']);
        });

        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id');
            $table->string('listing_type');
            $table->decimal('price', 12, 2)->default(0);
            $table->string('price_period')->nullable();
            $table->unsignedSmallInteger('bedrooms')->default(0);
            $table->unsignedSmallInteger('bathrooms')->default(0);
            $table->decimal('area_sqm', 8, 2)->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('status')->default('available');
            $table->boolean('active')->default(false);
            $table->string('header')->nullable();
            $table->string('logo')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamps();
        });

        Schema::create('house_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('description')->nullable();
            $table->unique(['house_id', 'locale']);
            $table->timestamps();
        });

        Schema::create('house_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('listing_type');
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->unsignedSmallInteger('guests')->nullable();
            $table->decimal('offer_price', 12, 2)->nullable();
            $table->text('message')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    private function makeUser(string $email): User
    {
        $user = new User();
        $user->forceFill([
            'username' => Str::before($email, '@').Str::lower(Str::random(4)),
            'fullname' => 'House Owner',
            'email' => $email,
            'password' => bcrypt('secret'),
            'active' => 1,
        ])->save();

        return $user;
    }
}
