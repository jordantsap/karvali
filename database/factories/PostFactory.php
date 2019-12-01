<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'active' => '1',
      'title' => $faker->name,
      'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'slug' =>$faker->slug,
      'post_type' => rand(1, 6),
      'image' => 'noimage.jpg', //$faker->imageUrl($width = 640, $height = 480),
      'description' => $faker->realText($maxNbChars = 500, $indexSize = 2),
      'user_id' => rand(1, 2),
    ];
});
