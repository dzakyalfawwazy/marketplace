<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => 'Discount ' . $this->faker->word,
            'desc' => $this->faker->sentence,
            'discount_percent' => $this->faker->randomFloat(2, 5, 50),
            'active' => $this->faker->boolean,
        ];
    }
}
