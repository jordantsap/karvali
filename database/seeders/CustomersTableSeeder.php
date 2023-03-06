<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();
        DB::table('customers')->insert([
            'name' => 'jordantsap',
            // 'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
            'email' => 'jordantsap@hotmail.gr',
            'password' => bcrypt('123456'),
            'city' => 'Kavala',
            'province' => 'An Makedonia',
            'address' => 'N.Karvali',
            'postalcode' => '64006',
            'phone' => '6958976581',
            'otherinfo' => 'Apenanti apo to gipedo',
        ]);
    }
}
