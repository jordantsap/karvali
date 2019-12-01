<?php

use Faker\Generator as Faker;

$factory->define(App\AlbumPhoto::class, function (Faker $faker) {
    return [
      'active' => '1',
      // 'title' => $faker->name,
      'alt' =>$faker->sentence($nbWords = 6, $variableNbWords = true),
      'album_id' => rand(1, 2),
      'file' => 'noimage.jpg', //$faker->imageUrl($width = 640, $height = 480),
      // 'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
