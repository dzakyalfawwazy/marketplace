<?php

namespace Database\Factories;

use App\Models\productdetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\productsimages>
 */
class ProductsimagesFactory extends Factory
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
            'productdetails_id' => productdetail::inRandomOrder()->first()->id,
            'images' => $this->faker->randomElement(['images/default.png','images/default2.png']),
        ];
    }
}
