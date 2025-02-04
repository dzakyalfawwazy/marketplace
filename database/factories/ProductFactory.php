<?php

namespace Database\Factories;

use App\Models\categories;
use App\Models\discount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
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
            'desc' => $this->faker->paragraph,
            'category_id' => categories::inRandomOrder()->first()->id,
            'discount_id' => discount::inRandomOrder()->first()->id ?? null,
        ];
    }
}
