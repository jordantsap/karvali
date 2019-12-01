<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
      'active'=> '1',
      'title' => $faker->name,
      'slug' =>$faker->slug,
      'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'header' => 'noimage.jpg',
      'logo' => 'logo.jpg',
      'image1' => 'noimage.jpg',
      'image2' => 'noimage.jpg',
      'image3' => 'noimage.jpg',
      'start_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
      'start_time' => '12:60', //time($format = 'H:i:s', $max = 'now') // '20:49:42'
      'end_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
      'end_time' => '18:60', //time($format = 'H:i:s', $max = 'now') // '20:49:42'
      'entrance' => $faker->numberBetween($min = 10, $max = 500),
      'telephone' => '2510-316270',
      'website' => $faker->domainName,
      'email' => $faker->email,
      'facebook' => $faker->domainName,
      'twitter' => $faker->domainName,
      // 'address' => $faker->address,
      // 'lat' => $faker->latitude($min = 40, $max = 41),
      // 'lng' => $faker->longitude($min = 24, $max = 25),
      'description' => $faker->realText($maxNbChars = 500, $indexSize = 3),
      'user_id' => rand(1, 2),
      // 'group_id' => factory('App\Group')->create()->id,
    ];
});
