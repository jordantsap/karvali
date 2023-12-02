<?php


use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->truncate();

        Field::factory()->count(13)->create();

//        Field::create([
//            'title' => $this->faker->name,
////            'value' => $this->faker->name,
//            'product_type_id' => rand(1,10),
//            'slug' => $this->faker->slug,
//        ]);
    }
}
