<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Venue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->truncate();
        // $products = factory(App\Models\Product::class, 15)->create();
        Venue::factory()->count(12)->create();
    }
}
