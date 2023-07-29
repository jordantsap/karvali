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
            'name:en' => 'Hotel',
            'slug:en' => 'hotel',

            'name:el' => 'Ξενοδοχείο',
            'slug:el' => 'xenodoxeio',
        ]);
        AccommodationType::create([
            'name:en' => 'Camping',
            'slug:en' => 'camping',

            'name:el' => 'Κάμπιγκ',
            'slug:el' => 'kamping',
        ]);
        AccommodationType::create([
            'name:en' => 'Apartment',
            'slug:en' => 'apartment',

            'name:el' => 'Διαμέρισμα',
            'slug:el' => 'diamerisma',
        ]);
        AccommodationType::create([
            'name:en' => 'Villa',
            'slug:en' => 'villa',

            'name:el' => 'Έπαυλη',
            'slug:el' => 'Έπαυλη',
        ]);
        AccommodationType::create([
            'name:en' => 'Guesthouse-Hostel',
            'slug:en' => 'guesthouse-Hostel',

            'name:el' => 'Ξενώνας',
            'slug:el' => 'Ξενώνας',
        ]);
        AccommodationType::create([
            'name:en' => 'Vacation Rental',
            'slug:en' => 'Vacation Rental',

            'name:el' => 'Ενοικίαση διακοπών',
            'slug:el' => 'ενοικίαση-διακοπών',
        ]);
        AccommodationType::create([
            'name:en' => 'Resort',
            'slug:en' => 'Resort',

            'name:el' => 'Θέρετρο',
            'slug:el' => 'θέρετρο',
        ]);
        AccommodationType::create([
            'name:en' => 'Motel',
            'slug:en' => 'Motel',

            'name:el' => 'Μοτέλ',
            'slug:el' => 'Μοτέλ',
        ]);
    }
}
