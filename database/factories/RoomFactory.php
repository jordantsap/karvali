<?php

namespace Database\Factories;

use App\Models\Accommodation;
use App\Models\Amenity;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'active'=> '1',
            'accommodation_id'=> Accommodation::factory()->create()->id,
            'room_type_id'=> rand(1,6),
            'title' => $this->faker->company,
            'slug' =>$this->faker->slug,
            'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'header' => $this->faker->imageUrl(640, 480, 'animals', true),
            'logo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image1' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image2' => $this->faker->imageUrl(640, 480, 'animals', true),
            'image3' => $this->faker->imageUrl(640, 480, 'animals', true),
            // 'address' => $this->faker->address,
            // 'lat' => $this->faker->latitude($min = 40.958023, $max = 40.97),
            // 'lng' => $this->faker->longitude($min = 24.5050, $max = 24.5280),
            'description' => $this->faker->realText($maxNbChars = 300, $indexSize = 2),
//            'user_id' => rand(1, 2),
        ];
    }
}
