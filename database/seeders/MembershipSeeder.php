<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->truncate();

        Membership::factory()->count(10)->create();

//        Membership::create([
//            'status' => "Active",
//            'start_date' => now(),
//            'end_date' => now()->addDays(34),
//            'plan_id' => rand(1,5),
//            'user_id' => rand(1,8),
//        ]);
//        Membership::create([
//            'status' => "Active",
//            'start_date' => now(),
//            'end_date' => now()->addDays(34),
//            'plan_id' => rand(1,5),
//            'user_id' => rand(1,8),
//        ]);
//        Membership::create([
//            'status' => "Active",
//            'start_date' => now(),
//            'end_date' => now()->addDays(34),
//            'plan_id' => rand(1,5),
//            'user_id' => rand(1,8),
//        ]);
//        Membership::create([
//            'status' => "Active",
//            'start_date' => now(),
//            'end_date' => now()->addDays(34),
//            'plan_id' => rand(1,5),
//            'user_id' => rand(1,8),
//        ]);
    }
}
