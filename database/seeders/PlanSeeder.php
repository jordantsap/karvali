<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('plans')->truncate();

        Plan::create([
            'name:en' => 'Free',
            'slug:en' => 'free',
            'status:en' => "Active",

            'name:el' => 'Δωρεάν',
            'slug:el' => 'dwrean',
            'status:el' => "Ενεργό",

            'price' => 0,
            'duration' => 30,
//            'start_date' => now(),
//            'end_date' => now()->addDays(30),
//            'plan_id' => rand(1, 5),
//            'user_id' => rand(1, 8),
        ]);
        Plan::create([
            'name:en' => 'Main',
            'slug:en' => 'main',
            'status:en' => "Active",

            'name:el' => 'Κύριο',
            'slug:el' => 'kyrio',
            'status:el' => "Ενεργό",

            'price' => 19.99,
            'duration' => 30,
//            'start_date' => now(),
//            'end_date' => now()->addDays(30),
//            'plan_id' => rand(1, 5),
//            'user_id' => rand(1, 8),
        ]);
        Plan::create([
            'name:en' => 'Medium',
            'slug:en' => 'medium',
            'status:en' => "Active",

            'name:el' => 'Μεσαίο',
            'slug:el' => 'mesaio',
            'status:el' => "Ενεργό",

            'price' => 19.99,
            'duration' => 30,
//            'start_date' => now(),
//            'end_date' => now()->addDays(30),
//            'plan_id' => rand(1, 5),
//            'user_id' => rand(1, 8),
        ]);
        Plan::create([
            'name:en' => 'Big',
            'slug:en' => 'big',
            'status:en' => "Active",

            'name:el' => 'Μεγάλο',
            'slug:el' => 'megalo',
            'status:el' => "Ενεργό",

            'price' => 19.99,
            'duration' => 30,
//            'start_date' => now(),
//            'end_date' => now()->addDays(30),
//            'plan_id' => rand(1, 5),
//            'user_id' => rand(1, 8),
        ]);
    }
}
