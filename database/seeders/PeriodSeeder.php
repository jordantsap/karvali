<?php

namespace Database\Seeders;

use App\Models\unused\Period;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::create([
            'name' => 'Morning',
            'is_open' => 'yes'
        ]);
        Period::create([
            'name' => 'Noun',
            'is_open' => 'yes'
        ]);
        Period::create([
            'name' => 'Afternoon',
            'is_open' => 'yes'
        ]);
    }
}
