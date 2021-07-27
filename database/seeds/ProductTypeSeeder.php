<?php

use Illuminate\Database\Seeder;
use App\Models\ProductType;
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
        'name:en' => 'Coffee',
        'slug:en' => 'coffee',

        'name:el' => 'Καφές',
        'slug:el' => 'kafes',
      ]);
      ProductType::create([
        'name:en' => 'Alcohol',
        'slug:en' => 'alcohol',

        'name:el' => 'Αλκοόλ',
        'slug:el' => 'alkool',
      ]);
      ProductType::create([
        'name:en' => 'Free',
        'slug:en' => 'free',

        'name:el' => 'Δωρεάν',
        'slug:el' => 'dwrean'
      ]);
      ProductType::create([
        'name:en' => 'Hand Made',
        'slug:en' => 'handmade',

        'name:el' => 'Χειροποίητα',
        'slug:el' => 'xeiropoihta',
      ]);
      ProductType::create([
        'name:en' => 'Organic',
        'slug:en' => 'organic',

        'name:el' => 'Βιολογικά',
        'slug:el' => 'viologika',
      ]);
      ProductType::create([
        'name:en' => 'Sweets',
        'slug:en' => 'sweets',

        'name:el' => 'Γλυκά',
        'slug:el' => 'glyka',
      ]);
      ProductType::create([
        'name:en' => 'Fast Food',
        'slug:en' => 'fastfood',

        'name:el' => 'Γρήγορο Φαγητό',
        'slug:el' => 'grygorofagito',
      ]);
      ProductType::create([
        'name:en' => 'Fruits',
        'slug:en' => 'fruits',

        'name:el' => 'Φρούτα',
        'slug:el' => 'frouta',
      ]);
      ProductType::create([
        'name:en' => 'Traditional',
        'slug:en' => 'traditional',

        'name:el' => 'Παραδοσιακό',
        'slug:el' => 'paradosiako',
      ]);
      ProductType::create([
        'name:en' => 'Pharmaceuticals',
        'slug:en' => 'pharmaceuticals',

        'name:el' => 'Φαρμακευτικά',
        'slug:el' => 'farmakeytika',
      ]);
      ProductType::create([
        'name:en' => 'Agricultural',
        'slug:en' => 'agricultural',

        'name:el' => 'Αγροτικά',
        'slug:el' => 'agrotika',
      ]);
      ProductType::create([
        'name:en' => 'Service',
        'slug:en' => 'service',

        'name:el' => 'Υπηρεσία',
        'slug:el' => 'ypiresia',
      ]);
      ProductType::create([
        'name:en' => 'Building Materials',
        'slug:en' => 'buildingmaterials',

        'name:el' => 'Οικοδομικά υλικά',
        'slug:el' => 'ykodomikaylika',
      ]);
      ProductType::create([
        'name:en' => 'Electronics',
        'slug:en' => 'electronics',

        'name:el' => 'Ηλεκτρονικά',
        'slug:el' => 'hlektronika',
      ]);
      ProductType::create([
        'name:en' => 'Others',
        'slug:en' => 'others',

        'name:el' => 'Διάφορα',
        'slug:el' => 'diafora',
      ]);
    }
}
