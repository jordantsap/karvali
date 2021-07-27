<?php

namespace Database\Factories;

use App\Models\AlbumPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class AlbumPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AlbumPhoto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'active' => '1',
            // 'title' => $faker->name,
            'alt' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'album_id' => rand(1, 2),
            'file' => 'noimage.jpg', //$faker->imageUrl($width = 640, $height = 480),
            // 'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
