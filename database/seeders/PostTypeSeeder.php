<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'title:en' => 'Political',
            'slug:en' => 'politics',


            'title:el' => 'Πολιτικές',
            'slug:el' => 'politikes',
        ]);
        PostType::create([
            'title:en' => 'Educational',
            'slug:en' => 'education',

            'title:el' => 'Εκπαιδευτικές',
            'slug:el' => 'ekpedeytikes',
        ]);
        PostType::create([
            'title:en' => 'Local',
            'slug:en' => 'local',

            'title:el' => 'Τοπικές',
            'slug:el' => 'topikes',
        ]);
        PostType::create([
            'title:en' => 'Country Based',
            'slug:en' => 'countrybased',

            'title:el' => 'Κρατικές',
            'slug:el' => 'kratikes',
        ]);
        PostType::create([
            'title:en' => 'Sports',
            'slug:en' => 'sports',


            'title:el' => 'Αθλητικές',
            'slug:el' => 'athlitikes',
        ]);
        PostType::create([
            'title:en' => 'Technological',
            'slug:en' => 'technological',

            'title:el' => 'Τεχνολογικές',
            'slug:el' => 'texnologikes',
        ]);
        PostType::create([
            'title:en' => 'Work',
            'slug:en' => 'work',

            'title:el' => 'Εργασιακές',
            'slug:el' => 'ergasiakes',
        ]);
        PostType::create([
            'title:en' => 'World',
            'slug:en' => 'world',

            'title:el' => 'Παγκόσμιες',
            'slug:el' => 'pagkosmies',
        ]);
        PostType::create([
            'title:en' => 'Others',
            'slug:en' => 'others',

            'title:el' => 'Διάφορα',
            'slug:el' => 'diafora',
        ]);
    }
}
