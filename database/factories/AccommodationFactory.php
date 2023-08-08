<?php

namespace Database\Factories;

use App\Models\AccommodationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accommodation>
 */
class AccommodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'active' => '1',
            'title' => $this->faker->name,
            'slug' => $this->faker->slug,
            'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'header' => $this->faker->imageUrl(640, 480, 'animals', true),
            'logo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image1' => 'noimage.jpg',
            'image2' => 'noimage.jpg',
            'image3' => 'noimage.jpg',
            'telephone' => '2510-316270',
            'manager' => $this->faker->name,
            'website' => $this->faker->domainName,
            'email' => $this->faker->email,
            'facebook' => $this->faker->domainName,
            'twitter' => $this->faker->domainName,
            // 'address' => $this->faker->address,
            // 'lat' => $this->faker->latitude($min = 40, $max = 41),
            // 'lng' => $this->faker->longitude($min = 24, $max = 25),
            'description' => $this->faker->realText($maxNbChars = 500, $indexSize = 3),
            'user_id' => rand(1, 5),
            'total_rooms' => rand(1, 10),
            'accommodation_type_id' => rand(1, 10),
        ];
    }
}
