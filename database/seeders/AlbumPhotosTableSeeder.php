<?php

namespace Database\Seeders;

use App\Models\AlbumPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
