<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
      'title' => $faker->name,
      'active'=> '1',
      'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'slug' =>$faker->slug,
      'header' => 'noimage.jpg',
      'logo' => 'logo.jpg',
      'image1' => 'noimage.jpg',
      'image2' => 'noimage.jpg',
      'image3' => 'noimage.jpg',
      'description' => $faker->realText($maxNbChars = 300, $indexSize = 2),
      'sku' => $faker->unixTime($max = 'now'),
      'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50), // 48.8932
      'product_type' => rand(1, 8),
      'company_id' => rand(1, 5),
      'user_id' => '1',
    ];
});
