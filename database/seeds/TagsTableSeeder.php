<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tags')->insert([
        'name' => 'Education',
        'slug' => 'education',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Music',
        'slug' => 'music',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Coffee',
        'slug' => 'coffee',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Delivery',
        'slug' => 'delivery',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Beach-Bar',
        'slug' => 'beach-bar',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Coffee Bar',
        'slug' => 'coffee-bar',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);

      DB::table('tags')->insert([
        'name' => 'SeaSide',
        'slug' => 'seaside',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Alcohol',
        'slug' => 'alcohol',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Rooms',
        'slug' => 'rooms',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
	  DB::table('tags')->insert([
        'name' => 'Event Venue',
        'slug' => 'event-venue',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Food',
        'slug' => 'food',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Fast Food',
        'slug' => 'fast-food',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Fresh Food',
        'slug' => 'fresh-food',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Cooking',
        'slug' => 'cooking',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Sweets',
        'slug' => 'sweets',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Snacks',
        'slug' => 'snacks',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Services',
        'slug' => 'services',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Children',
        'slug' => 'children',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Playground',
        'slug' => 'playground',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Locals',
        'slug' => 'locals',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Gifts',
        'slug' => 'gifts',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
      DB::table('tags')->insert([
        'name' => 'Mornings',
        'slug' => 'mornings',
        'image' => 'http://www.soundslikebranding.com/imgs/blogpost_custvsfan.gif',
      ]);
    }
}
