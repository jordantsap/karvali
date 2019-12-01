<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
      'active'=> '1',
      'title' => $faker->company,
      'slug' =>$faker->slug,
      'meta_description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'meta_keywords' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'company_type' => rand(1, 12),
      'delivery' => $faker->randomElement($array = array ('No','Yes')),
      'manager' => $faker->name,
      'header' => 'noimage.jpg',
      'logo' => 'logo.jpg',
      'image1' => 'noimage.jpg',
      'image2' => 'noimage.jpg',
      'image3' => 'noimage.jpg',
      'days' => '',
      'morningtime' => $faker->time($format = 'H:i', $min = 'now'), // '20:49:42'
      'afternoontime' => $faker->time($format = 'H:i', $min = 'now'),
      'telephone' => '2510-867512',
      'website' => $faker->domainName,
      'email' => $faker->email,
      'facebook' => $faker->domainName,
      'twitter' => $faker->domainName,
      // 'address' => $faker->address,
      // 'lat' => $faker->latitude($min = 40.958023, $max = 40.97),
      // 'lng' => $faker->longitude($min = 24.5050, $max = 24.5280),
      'pos' => $faker->randomElement($array = array ('No','Yes')),
      'creditcard' => $faker->randomElement($array = array ('Visa', 'Mastercard','American-Express')),
      'description' => $faker->realText($maxNbChars = 300, $indexSize = 2),
      'user_id' => rand(1, 2),
    ];
});
