<?php

namespace Database\Seeders;

use App\Models\CompanyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'title:en' => 'Retail Sales',
            'slug:en' => 'retail-sales',

            'title:el' => 'Πωλησεις Λιανικης',
            'slug:el' => 'pwlhseis-lianikhs',
        ]);
        CompanyType::create([
            'title:en' => 'Coffee',
            'slug:en' => 'coffee',

            'title:el' => 'Καφετέρια',
            'slug:el' => 'cafeteria',
        ]);
        CompanyType::create([
            'title:en' => 'Hairdressers',
            'slug:en' => 'hairdressers',
            'title:el' => 'Κομμωτήρια',
            'slug:el' => 'kommwthria',
        ]);
        CompanyType::create([
            'title:en' => 'Fast Food',
            'slug:en' => 'fast-food',

            'title:el' => 'Γρήγορο Φαγητό',
            'slug:el' => 'grigorofagito',
        ]);
        CompanyType::create([
            'title:en' => 'Ouzeri',
            'slug:en' => 'oyzodrink',

            'title:el' => 'Ουζερί',
            'slug:el' => 'oyzeri',
        ]);
        CompanyType::create([
            'title:en' => 'Traditional Cafes',
            'slug:en' => 'traditionalcafes',

            'title:el' => 'Καφενεία',
            'slug:el' => 'kafeneia',
        ]);
        CompanyType::create([
            'title:en' => 'Restaurants',
            'slug:en' => 'restaurants',

            'title:el' => 'Εστιατόρια',
            'slug:el' => 'estiatoria',
        ]);
        CompanyType::create([
            'title:en' => 'Butchers',
            'slug:en' => 'butchers',

            'title:el' => 'Κρεοπωλεία',
            'slug:el' => 'kreopwleia',
        ]);
        CompanyType::create([
            'title:en' => 'Pasteria',
            'slug:en' => 'pasteria',

            'title:el' => 'Ζαχαροπλαστεία',
            'slug:el' => 'zaxaroplasteia',
        ]);
        CompanyType::create([
            'title:en' => 'Grocery store',
            'slug:en' => 'grocerystore',

            'title:el' => 'Μανάβικα',
            'slug:el' => 'manavika',
        ]);
        CompanyType::create([
            'title:en' => 'Bougatsa',
            'slug:en' => 'bougatsa',

            'title:el' => 'Μπουγατσες',
            'slug:el' => 'mpoygatses',
        ]);
        CompanyType::create([
            'title:en' => 'Bakery',
            'slug:en' => 'bakery',

            'title:el' => 'Αρτοσκευάσματα',
            'slug:el' => 'artoskeyasmata',
        ]);
        CompanyType::create([
            'title:en' => 'Construction Tools',
            'slug:en' => 'construction-tools',

            'title:el' => 'Οικοδομικά Υλικά',
            'slug:el' => 'oikodomikaylika',
        ]);
//        CompanyType::create([
//            'title:en' => 'Rentals',
//            'slug:en' => 'rentals',
//
//            'title:el' => 'Δωμάτια',
//            'slug:el' => 'rentrooms',
//        ]);
//        CompanyType::create([
//            'title:en' => 'Others',
//            'slug:en' => 'others',
//
//            'title:el' => 'Διάφορα',
//            'slug:el' => 'diafora',
//        ]);
    }
}
