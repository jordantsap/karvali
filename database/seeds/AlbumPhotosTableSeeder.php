<?php

use Illuminate\Database\Seeder;

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
        $albums = factory(App\AlbumPhoto::class, 12)->create();
    }
}
