<?php

namespace Database\Factories;

use App\Models\Company;
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
//        foreach (config('translatable.locales') as $locale)
//        {
            return [
                'title' => $this->faker->name,
                'active' => '1',
                'meta_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                'meta_keywords' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
                'slug' => $this->faker->slug,
                'header' => $this->faker->imageUrl(640, 480, 'animals', true),
                'logo' => $this->faker->imageUrl(640, 480, 'animals', true),
                'image1' => $this->faker->imageUrl(640, 480, 'animals', true),
                'image2' => $this->faker->imageUrl(640, 480, 'animals', true),
                'image3' => $this->faker->imageUrl(640, 480, 'animals', true),
                'description' => $this->faker->realText($maxNbChars = 300, $indexSize = 2),
                'sku' => $this->faker->unixTime($max = 'now'),
                'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50), // 48.8932
                'product_type' => rand(1, 5), //ProductType::factory(),
                'company_id' => rand(1,2),
                'user_id' => '3',
            ];
//        }
    }
};
