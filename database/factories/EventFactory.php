<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
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
            'image1' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image2' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image3' => $this->faker->imageUrl(640, 480, 'animals', true),
            'start_date' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'start_time' => '12:60', //time($format = 'H:i:s', $max = 'now') // '20:49:42'
            'end_date' => $this->faker->date($format = 'Y-m-d', $min = 'now'),
            'end_time' => '18:60', //time($format = 'H:i:s', $max = 'now') // '20:49:42'
            'entrance' => $this->faker->numberBetween($min = 10, $max = 500),
            'telephone' => '2510-316270',
            'website' => $this->faker->domainName,
            'email' => $this->faker->email,
            'facebook' => $this->faker->domainName,
            'twitter' => $this->faker->domainName,
            // 'address' => $this->faker->address,
            // 'lat' => $this->faker->latitude($min = 40, $max = 41),
            // 'lng' => $this->faker->longitude($min = 24, $max = 25),
            'description' => $this->faker->realText($maxNbChars = 500, $indexSize = 3),
            'user_id' => rand(1, 2),
             'venue_id' => Venue::factory()->create()->id,
        ];
    }
}
