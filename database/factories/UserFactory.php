<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'username' => 'jordantsap',
            // 'email' => 'jordantsap@hotmail.gr',
            // 'active' => '1',
            // // 'role_id'=> '1',
            // 'email_verified_at' => now(),
            // 'password' => bcrypt('123456'),
            // 'remember_token' => str_random(10),
        ];

        // return [
        //     'username' => $faker->name,
        //     'email' => $faker->unique()->safeEmail,
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        //     'remember_token' => str_random(10),
        // ];
    }
};
