<?php

namespace Database\Seeders;

use App\Models\AttributeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute_types')->truncate();

        AttributeType::create([
            'type' => 'checkbox',
        ]);
        AttributeType::create([
            'type' => 'radio',
        ]);
    }
}
