<?php

namespace Database\Factories;

use App\Models\unused\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

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
            'meta_description' => $this->faker->slug,
            'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'alt' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'cover_image' => 'noimage.jpg', //$faker->imageUrl($width = 640, $height = 480),
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
