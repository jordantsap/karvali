<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PostType;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('post_types')->truncate();
      PostType::create([
        'name:en' => 'Political',
        'slug:en' => 'politics',


        'name:el' => 'Πολιτικές',
        'slug:el' => 'politikes',
      ]);
      PostType::create([
        'name:en' => 'Educational',
        'slug:en' => 'education',

        'name:el' => 'Εκπαιδευτικές',
        'slug:el' => 'ekpedeytikes',
      ]);
      PostType::create([
        'name:en' => 'Local',
        'slug:en' => 'local',

        'name:el' => 'Τοπικές',
        'slug:el' => 'topikes',
      ]);
      PostType::create([
        'name:en' => 'Country Based',
        'slug:en' => 'countrybased',

        'name:el' => 'Κρατικές',
        'slug:el' => 'kratikes',
      ]);
      PostType::create([
        'name:en' => 'Sports',
        'slug:en' => 'sports',


        'name:el' => 'Αθλητικές',
        'slug:el' => 'athlitikes',
      ]);
      PostType::create([
        'name:en' => 'Technological',
        'slug:en' => 'technological',

        'name:el' => 'Τεχνολογικές',
        'slug:el' => 'texnologikes',
      ]);
      PostType::create([
        'name:en' => 'Work',
        'slug:en' => 'work',

        'name:el' => 'Εργασιακές',
        'slug:el' => 'ergasiakes',
      ]);
      PostType::create([
        'name:en' => 'World',
        'slug:en' => 'world',

        'name:el' => 'Παγκόσμιες',
        'slug:el' => 'pagkosmies',
      ]);
      PostType::create([
        'name:en' => 'Others',
        'slug:en' => 'others',

        'name:el' => 'Διάφορα',
        'slug:el' => 'diafora',
      ]);
    }
}
