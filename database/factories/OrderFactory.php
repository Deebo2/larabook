<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,1000),
            'total'   => fake()->numberBetween(1000,1000000),
            'created_at' => fake()->dateTimeBetween('-4 years',now(),config('app.timezone')),
        ];
    }
}
