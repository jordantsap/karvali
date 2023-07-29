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
            'manager' => $this->faker->name,
            'header' => 'noimage.jpg',
            'logo' => 'logo.jpg',
            'image1' => 'noimage.jpg',
            'image2' => 'noimage.jpg',
            'image3' => 'noimage.jpg',
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
