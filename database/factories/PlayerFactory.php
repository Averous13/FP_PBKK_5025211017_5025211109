<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'player_name' => fake()->name($gender = 'male'),
            'date_of_birth' => fake()->date(),
            'height' => rand(160, 200),
            'position_id' => rand(1, 4),
            'team_id' => rand(1, 20),
            'country_id' => rand(1, 246)
        ];
    }
}
