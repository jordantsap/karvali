<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'active' => '1',
            'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'slug' => $this->faker->slug,
            'header' => 'noimage.jpg',
            'logo' => 'logo.jpg',
            'image1' => 'noimage.jpg',
            'image2' => 'noimage.jpg',
            'image3' => 'noimage.jpg',
            'description' => $this->faker->realText($maxNbChars = 300, $indexSize = 2),
            'sku' => $this->faker->unixTime($max = 'now'),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50), // 48.8932
            'product_type' => rand(1, 12), //ProductType::factory(),
            'company_id' => rand(1, 5),
            'user_id' => '1',
        ];
    }
};
