<?php

namespace Database\Seeders;

use App\Models\AccommodationType;
use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('amenities')->truncate();

        Amenity::create([
            'title:en' => 'Private Parking',
            'slug:en' => 'privateparking',
            'price' => '50 Euro',

            'title:el' => 'Ιδιωτικό Παρκινγκ',
            'slug:el' => 'ιδιωτικοπαρκινγκ',
            'price' => '50 Ευρω',
        ]);
        Amenity::create([
            'title:en' => 'Free Parking',
            'slug:en' => 'freeparking',

            'title:el' => 'Δωρεάν Παρκινγκ',
            'slug:el' => 'δωρεαν-παρκινγκ',
        ]);
        Amenity::create([
            'title:en' => 'Pool',
            'slug:en' => 'pool',

            'title:el' => 'Πισίνα',
            'slug:el' => 'πισίνα',
        ]);
        Amenity::create([
            'title:en' => 'Camp Bed',
            'slug:en' => 'camp-bed',

            'title:el' => 'Ράντζο',
            'slug:el' => 'ραντζο',
        ]);
    }
}
