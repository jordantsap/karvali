<?php

namespace Database\Seeders;

use App\Models\AccommodationType;
use App\Models\GroupType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accommodation_types')->truncate();

        AccommodationType::create([
            'title:en' => 'Hotel',
            'slug:en' => 'hotel',

            'title:el' => 'Ξενοδοχείο',
            'slug:el' => 'xenodoxeio',
        ]);
        AccommodationType::create([
            'title:en' => 'Camping',
            'slug:en' => 'camping',

            'title:el' => 'Κάμπιγκ',
            'slug:el' => 'kamping',
        ]);
        AccommodationType::create([
            'title:en' => 'Apartment',
            'slug:en' => 'apartment',

            'title:el' => 'Διαμέρισμα',
            'slug:el' => 'diamerisma',
        ]);
        AccommodationType::create([
            'title:en' => 'Villa',
            'slug:en' => 'villa',

            'title:el' => 'Έπαυλη',
            'slug:el' => 'epayli',
        ]);
        AccommodationType::create([
            'title:en' => 'Hostel',
            'slug:en' => 'Hostel',

            'title:el' => 'Ξενώνας',
            'slug:el' => 'ksenwnas',
        ]);
        AccommodationType::create([
            'title:en' => 'Vacation Rental',
            'slug:en' => 'Vacation Rental',

            'title:el' => 'Ενοικίαση διακοπών',
            'slug:el' => 'rent-house',
        ]);
        AccommodationType::create([
            'title:en' => 'Resort',
            'slug:en' => 'Resort',

            'title:el' => 'Θέρετρο',
            'slug:el' => 'theretro',
        ]);
        AccommodationType::create([
            'title:en' => 'Motel',
            'slug:en' => 'motel',

            'title:el' => 'Μοτέλ',
            'slug:el' => 'Μοτέλ',
        ]);
    }
}
