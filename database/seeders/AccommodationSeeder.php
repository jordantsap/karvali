<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccommodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accommodations')->truncate();
        // $companies = factory(App\Models\Company::class, 12)->create();
        Accommodation::factory()->count(4)->create();
    }
}
