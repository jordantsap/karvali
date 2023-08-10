<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    return [
      'active'=> '1',
      'title' => $this->faker->company,
      'slug' =>$this->faker->slug,
      'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
      'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
      'company_type' => rand(1, 12),
      'delivery' => $this->faker->randomElement($array = array ('No','Yes')),
      'manager' => $this->faker->name,
      'header' => 'noimage.jpg',
      'logo' => 'logo.jpg',
      'image1' => 'noimage.jpg',
      'image2' => 'noimage.jpg',
      'image3' => 'noimage.jpg',
      'days' => '',
      'opening_times' => $this->faker->time($format = 'H:i', $min = 'now'), // '20:49:42'
      'closing_times' => $this->faker->time($format = 'H:i', $min = 'now'),
      'telephone' => '2510-867512',
      'website' => $this->faker->domainName,
      'email' => $this->faker->email,
      'facebook' => $this->faker->domainName,
      'twitter' => $this->faker->domainName,
      // 'address' => $this->faker->address,
      // 'lat' => $this->faker->latitude($min = 40.958023, $max = 40.97),
      // 'lng' => $this->faker->longitude($min = 24.5050, $max = 24.5280),
      'pos' => $this->faker->randomElement($array = array ('No','Yes')),
      'creditcard' => $this->faker->randomElement($array = array ('Visa', 'Mastercard','American-Express')),
      'description' => $this->faker->realText($maxNbChars = 300, $indexSize = 2),
      'user_id' => rand(1, 2),
    ];
}
}
