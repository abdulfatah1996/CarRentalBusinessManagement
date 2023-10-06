<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'company' => fake()->company(),
            'year' => fake()->year('now'),
            'numberDoors' => fake()->numberBetween(0, 10),
            'size' => $this->faker->randomElement(['small', 'middle', 'big']),
            'rentalCost' => fake()->numberBetween(0, 5000),
            'fuelType' => $this->faker->randomElement(['solar', 'Gas', 'petrol']),
            'picture' => fake()->imageUrl(640, 480, 'cat'),
            'user_id' => User::where('role', '=', 'merchant')->get()->random()->id,
        ];
    }
}
