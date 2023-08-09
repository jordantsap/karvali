<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->truncate();
        ProductType::create([
            'title:en' => 'Coffee',
            'slug:en' => 'coffee',

            'title:el' => 'Καφές',
            'slug:el' => 'kafes',
        ]);
        ProductType::create([
            'title:en' => 'Alcohol',
            'slug:en' => 'alcohol',

            'title:el' => 'Αλκοόλ',
            'slug:el' => 'alkool',
        ]);
        ProductType::create([
            'title:en' => 'Hand Made',
            'slug:en' => 'handmade',

            'title:el' => 'Χειροποίητα',
            'slug:el' => 'xeiropoihta',
        ]);
        ProductType::create([
            'title:en' => 'Organic',
            'slug:en' => 'organic',

            'title:el' => 'Βιολογικά',
            'slug:el' => 'viologika',
        ]);
        ProductType::create([
            'title:en' => 'Sweets',
            'slug:en' => 'sweets',

            'title:el' => 'Γλυκά',
            'slug:el' => 'glyka',
        ]);
        ProductType::create([
            'title:en' => 'Fast Food',
            'slug:en' => 'fastfood',

            'title:el' => 'Γρήγορο Φαγητό',
            'slug:el' => 'grygorofagito',
        ]);
        ProductType::create([
            'title:en' => 'Fruits',
            'slug:en' => 'fruits',

            'title:el' => 'Φρούτα',
            'slug:el' => 'frouta',
        ]);
        ProductType::create([
            'title:en' => 'Traditional',
            'slug:en' => 'traditional',

            'title:el' => 'Παραδοσιακό',
            'slug:el' => 'paradosiako',
        ]);
        ProductType::create([
            'title:en' => 'Pharma',
            'slug:en' => 'pharma',

            'title:el' => 'Φαρμακευτικά',
            'slug:el' => 'farmakeytika',
        ]);
        ProductType::create([
            'title:en' => 'Agriculture',
            'slug:en' => 'agriculture',

            'title:el' => 'Αγροτικά',
            'slug:el' => 'agrotika',
        ]);
        ProductType::create([
            'title:en' => 'Service',
            'slug:en' => 'service',

            'title:el' => 'Υπηρεσία',
            'slug:el' => 'ypiresia',
        ]);
        ProductType::create([
            'title:en' => 'Building Materials',
            'slug:en' => 'buildingmaterials',

            'title:el' => 'Οικοδομικά υλικά',
            'slug:el' => 'ykodomikaylika',
        ]);
        ProductType::create([
            'title:en' => 'Electronics',
            'slug:en' => 'electronics',

            'title:el' => 'Ηλεκτρονικά',
            'slug:el' => 'hlektronika',
        ]);
//        ProductType::create([
//            'title:en' => 'Free',
//            'slug:en' => 'free',
//
//            'title:el' => 'Δωρεάν',
//            'slug:el' => 'dwrean'
//        ]);

//        ProductType::create([
//            'title:en' => 'Others',
//            'slug:en' => 'others',
//
//            'title:el' => 'Διάφορα',
//            'slug:el' => 'diafora',
//        ]);
    }
}
