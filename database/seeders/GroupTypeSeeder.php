<?php

namespace Database\Seeders;

use App\Models\GroupType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_types')->truncate();
        GroupType::create([
            'title:en' => 'Cultural',
            'slug:en' => 'cultural',

            'title:el' => 'Πολιτιστικός',
            'slug:el' => 'politistikos',
        ]);
        GroupType::create([
            'title:en' => 'Landscaping',
            'slug:en' => 'landscaping',

            'title:el' => 'Εξωραΐστικός',
            'slug:el' => 'ekswraistikos',
        ]);
        GroupType::create([
            'title:en' => 'Environmental',
            'slug:en' => 'environmental',

            'title:el' => 'Περιβαλοντολογικός',
            'slug:el' => 'perivalontologikos',
        ]);
        GroupType::create([
            'title:en' => 'Dancing',
            'slug:en' => 'dancing',

            'title:el' => 'Χoρευτικός',
            'slug:el' => 'xoreytikos',
        ]);
        GroupType::create([
            'title:en' => 'Sports',
            'slug:en' => 'sports',

            'title:el' => 'Αθλητικός',
            'slug:el' => 'athlitikos',
        ]);
    }
}
