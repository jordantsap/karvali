<?php

namespace Database\Seeders;

//use Database\Seeders\{AlbumsTableSeeder,
//    AlbumPhotosTableSeeder,
//    CompaniesTableSeeder,
//    CompanyTypeSeeder,
//    EventsTableSeeder,
//    GroupsTableSeeder,
//    GroupTypeSeeder,
//    PermissionTableSeeder,
//    PostsTableSeeder,
//    PostTypeSeeder,
//    ProductsTableSeeder,
//    ProductTypeSeeder,
//    RoleTableSeeder,
//    UsersTableSeeder};
use App\Models\AttributeType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        app()['cache']->forget('spatie.permission.cache');
        // SYSTEM SEEDERS
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AccommodationTypeSeeder::class);
        $this->call(PostTypeSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(MembershipSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(GroupTypeSeeder::class);

        $this->call(AttributeTypeSeeder::class);
        $this->call(AttributeSeeder::class);

//        $this->call(VenueSeeder::class);
//        $this->call(EventsTableSeeder::class);
//        $this->call(AccommodationSeeder::class);
//        $this->call(RoomSeeder::class);

//        $this->call(CompaniesTableSeeder::class);
//        $this->call(ProductsTableSeeder::class);
//
//        $this->call(GroupsTableSeeder::class);
//
//

//        $this->call(DaySeeder::class);
//        $this->call(PeriodSeeder::class);

        // just for reference
//          $this->call(CompanyOpeningHoursSeeder::class);
//          $this->call(AlbumsTableSeeder::class);
//          $this->call(AlbumPhotosTableSeeder::class);
//           $this->call(TagsTableSeeder::class);
//         $this->call(RolesAndPermissionsSeeder::class);
//         $this->call(CustomersTableSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        User::reguard();
    }
}
