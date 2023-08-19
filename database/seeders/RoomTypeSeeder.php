<?php

namespace Database\Seeders;

use App\Models\AccommodationType;
use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->truncate();
        RoomType::factory()->count(5)->create();
        RoomType::create([
            'title:en' => 'Single',
            'slug:en' => 'singleen',

            'title:el' => 'Μονό',
            'slug:el' => 'μονο',
        ]);
        RoomType::create([
            'title:en' => 'Double',
            'slug:en' => 'double',

            'title:el' => 'Διπλό',
            'slug:el' => 'διπλό',
        ]);
        RoomType::create([
            'title:en' => 'Triple',
            'slug:en' => 'triple',

            'title:el' => 'Τριπλό',
            'slug:el' => 'τριπλό',
        ]);
        RoomType::create([
            'title:en' => 'Family',
            'slug:en' => 'family',

            'title:el' => 'Οικογενειακό',
            'slug:el' => 'οικογενειακό',
        ]);
    }
}
