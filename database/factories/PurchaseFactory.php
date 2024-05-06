<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{

    public function definition(): array
    {
        return [
            'total_price' => fake()->numberBetween(10, 50)
        ];
    }
}
