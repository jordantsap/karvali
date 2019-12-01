<?php

use Faker\Generator as Faker;

$factory->define(App\Album::class, function (Faker $faker) {
    return [
      'active'=> '1',
      'title' => $faker->name,
      'slug' =>$faker->slug,
      'meta_description' => $faker->slug,
      'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'alt' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'cover_image' => 'noimage.jpg', //$faker->imageUrl($width = 640, $height = 480),
      'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});
