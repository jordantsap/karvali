<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

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
            'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'slug' => $this->faker->slug,
            'post_type' => rand(1, 6),
            'image' => 'noimage.jpg', //$this->faker->imageUrl($width = 640, $height = 480),
            'description' => $this->faker->realText($maxNbChars = 500, $indexSize = 2),
            'user_id' => rand(1, 2),
        ];
    }
}
