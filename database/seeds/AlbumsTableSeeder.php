<?php

use App\Models\Album;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;
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
