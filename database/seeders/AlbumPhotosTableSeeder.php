<?php

namespace Database\Seeders;

use App\Models\unused\AlbumPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('album_photos')->truncate();
        // $albums = factory(App\Models\AlbumPhoto::class, 12)->create();
        AlbumPhoto::factory()->count(12)->create();
    }
}
