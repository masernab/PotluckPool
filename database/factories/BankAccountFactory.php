<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountFactory extends Factory
{

    public function definition(): array
    {
        return [
            'bank_name'           => fake()->word,
            'account_number'      => fake()->creditCardNumber(),
            'account_holder_name' => fake()->name,
        ];
    }
}
