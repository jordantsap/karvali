<?php

namespace Database\Seeders;

use App\Models\unused\Album;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->truncate();
        // $albums = factory(App\Models\Album::class, 2)->create();
        Album::factory()->count(2)->create();
    }
}
