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
            'description:en' => 'description here',

            'name:el' => 'Δωρεάν',
            'slug:el' => 'dwrean',
            'status:el' => "Ενεργό",
            'description:el' => "Περιγραφη εδω",

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
            'description:en' => 'description here',

            'name:el' => 'Κύριο',
            'slug:el' => 'kyrio',
            'status:el' => "Ενεργό",
            'description:el' => 'εδω περιγραφη',

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
            'description:en' => 'description here',

            'name:el' => 'Μεσαίο',
            'slug:el' => 'mesaio',
            'status:el' => "Ενεργό",
            'description:el' => 'εδω περιγραφη',

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
            'description:en' => 'description here',

            'name:el' => 'Μεγάλο',
            'slug:el' => 'megalo',
            'status:el' => "Ενεργό",
            'description:el' => 'εδω περιγραφη',

            'price' => 19.99,
            'duration' => 30,
//            'start_date' => now(),
//            'end_date' => now()->addDays(30),
//            'plan_id' => rand(1, 5),
//            'user_id' => rand(1, 8),
        ]);
    }
}
