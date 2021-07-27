<?php

use Illuminate\Database\Seeder;
use App\Models\GroupType;
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
        'name:en' => 'Cultural',
        'slug:en' => 'cultural',

        'name:el' => 'Πολιτιστικός',
        'slug:el' => 'politistikos',
      ]);
      GroupType::create([
        'name:en' => 'Landscaping',
        'slug:en' => 'landscaping',

        'name:el' => 'Εξωραΐστικός',
        'slug:el' => 'ekswraistikos',
      ]);
      GroupType::create([
        'name:en' => 'Environmental',
        'slug:en' => 'environmental',

        'name:el' => 'Περιβαλοντολογικός',
        'slug:el' => 'perivalontologikos',
      ]);
      GroupType::create([
        'name:en' => 'Dancing',
        'slug:en' => 'dancing',

        'name:el' => 'Χoρευτικός',
        'slug:el' => 'xoreytikos',
      ]);
      GroupType::create([
        'name:en' => 'Sports',
        'slug:en' => 'sports',

        'name:el' => 'Αθλητικός',
        'slug:el' => 'athlitikos',
      ]);
    }
}
