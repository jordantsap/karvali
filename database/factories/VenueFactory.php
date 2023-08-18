<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'active' => '1',
            'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'slug' => $this->faker->slug,
//            'venue_type' => rand(1, 4),
            'entrance' => $this->faker->randomFloat(2),
//            'start_date' => $this->faker->date(),
//            'start_time' => $this->faker->date(),
//            'end_date' => $this->faker->date(),
//            'end_time' => $this->faker->date(),
            'manager' => $this->faker->name,
            'header' => $this->faker->imageUrl(640, 480, 'animals', true),
            'logo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image1' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image2' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image3' => $this->faker->imageUrl(640, 480, 'animals', true),
            'telephone' => '2510-163489',
            'website' => $this->faker->domainName,
            'email' => $this->faker->email,
            'facebook' => $this->faker->domainName,
            'twitter' => $this->faker->domainName,
            // 'address' => $this->faker->address,
            // 'lat' => $this->faker->latitude($min = 40, $max = 41),
            // 'lng' => $this->faker->longitude($min = 24, $max = 25),
            'description' => $this->faker->realText($maxNbChars = 500, $indexSize = 2),
            'user_id' => rand(1, 2),
        ];
    }
}
