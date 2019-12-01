<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    return [
      'title' => $faker->name,
      'active'=> '1',
      'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'slug' =>$faker->slug,
      'group_type' => rand(1, 5),
      'manager' => $faker->name,
      'header' => 'noimage.jpg',
      'logo' => 'logo.jpg',
      'image1' => 'noimage.jpg',
      'image2' => 'noimage.jpg',
      'image3' => 'noimage.jpg',
      'telephone' => '2510-163489',
      'website' => $faker->domainName,
      'email' => $faker->email,
      'facebook' => $faker->domainName,
      'twitter' => $faker->domainName,
      // 'address' => $faker->address,
      // 'lat' => $faker->latitude($min = 40, $max = 41),
      // 'lng' => $faker->longitude($min = 24, $max = 25),
      'description' => $faker->realText($maxNbChars = 500, $indexSize = 2),
      'user_id' => rand(1, 2),
    ];
});
