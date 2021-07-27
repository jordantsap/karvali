<?php

use Illuminate\Database\Seeder;
use App\Models\CompanyType;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('company_types')->truncate();
      // $companytype()->setDefaultLocale('el');
      CompanyType::create([
        'name:en' => 'Super Market',
        'slug:en' => 'super-market',

        'name:el' => 'Πολυκατάστημα',
        'slug:el' => 'polykatasthma',
      ]);
      CompanyType::create([
        'name:en' => 'Coffee Shop',
        'slug:en' => 'coffeeshop',

        'name:el' => 'Καφετέρια',
        'slug:el' => 'cafeteria',
      ]);
      CompanyType::create([
        'name:en' => 'Hairdressers',
        'slug:en' => 'hairdressers',
        'name:el' => 'Κομμωτήρια',
        'slug:el' => 'kommwthria',
      ]);
	    CompanyType::create([
        'name:en' => 'Fast Food',
        'slug:en' => 'fast-food',

        'name:el' => 'Γρήγορο Φαγητό',
        'slug:el' => 'grigorofagito',
      ]);
      CompanyType::create([
        'name:en' => 'Ouzeri',
        'slug:en' => 'oyzodrink',

        'name:el' => 'Ουζερί',
        'slug:el' => 'oyzeri',
      ]);
      CompanyType::create([
        'name:en' => 'Traditional Cafes',
        'slug:en' => 'traditionalcafes',

        'name:el' => 'Καφενεία',
        'slug:el' => 'kafeneia',
      ]);
      CompanyType::create([
        'name:en' => 'Restaurants',
        'slug:en' => 'restaurants',

        'name:el' => 'Εστιατόρια',
        'slug:el' => 'estiatoria',
      ]);
      CompanyType::create([
        'name:en' => 'Butchers',
        'slug:en' => 'butchers',

        'name:el' => 'Κρεοπωλεία',
        'slug:el' => 'kreopwleia',
      ]);
      CompanyType::create([
        'name:en' => 'Pasteria',
        'slug:en' => 'pasteria',

        'name:el' => 'Ζαχαροπλαστεία',
        'slug:el' => 'zaxaroplasteia',
      ]);
      CompanyType::create([
        'name:en' => 'Grocery store',
        'slug:en' => 'grocerystore',

        'name:el' => 'Μανάβικα',
        'slug:el' => 'manavika',
      ]);
      CompanyType::create([
        'name:en' => 'Bougatsa',
        'slug:en' => 'bougatsa',

        'name:el' => 'Μπουγατσες',
        'slug:el' => 'mpoygatses',
      ]);
      CompanyType::create([
        'name:en' => 'Bakery Products',
        'slug:en' => 'bakeryproducts',

        'name:el' => 'Αρτοσκευάσματα',
        'slug:el' => 'artoskeyasmata',
      ]);
      CompanyType::create([
        'name:en' => 'Rentals',
        'slug:en' => 'rentals',

        'name:el' => 'Δωμάτια',
        'slug:el' => 'rentrooms',
      ]);
      CompanyType::create([
        'name:en' => 'Construction Tools',
        'slug:en' => 'construction-tools',

        'name:el' => 'Οικοδομικά Υλικά',
        'slug:el' => 'oikodomikaylika',
      ]);
      CompanyType::create([
        'name:en' => 'Others',
        'slug:en' => 'others',

        'name:el' => 'Διάφορα',
        'slug:el' => 'diafora',
      ]);
    }
}
