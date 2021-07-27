<?php

use App\Models\Event;
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
        Event::factory()->count(12)->create();
    }
}
