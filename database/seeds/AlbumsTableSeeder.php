<?php

use Illuminate\Database\Seeder;

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
        $albums = factory(App\Album::class, 2)->create();
    }
}
