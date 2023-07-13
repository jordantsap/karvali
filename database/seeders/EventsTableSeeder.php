<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->truncate();
        // $events = factory(App\Models\Event::class, 15)->create();
//        app()->setLocale('el');
        Event::factory()->count(5)->create();
//        app()->setLocale('en');
//        Event::factory()->count(5)->create();

    }
}
