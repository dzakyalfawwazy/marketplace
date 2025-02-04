<?php

namespace Database\Factories;

use App\Models\product;
use App\Models\variantproducts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\productdetail>
 */
class ProductdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $variants = [
            ['variant' => 'Size', 'values' => ['M', 'S', 'L', 'XL']],
            ['variant' => 'Jenis', 'values' => ['up', 'middle', 'low']]
        ];

        $selectedVariant = $this->faker->randomElement($variants);

        return [
            //
            'product_id' => product::inRandomOrder()->first()->id,
            'variant_id' => variantproducts::inRandomOrder()->first()->id,
            'value' => $this->faker->randomElement(['M', 'S', 'L', 'XL']),
            'weight' => $this->faker->randomFloat(2, 0.5, 5),
            'baseprice' => $this->faker->numberBetween(10000,3000000),
            'sellprice' => $this->faker->numberBetween(10000,3000000),
        ];
    }
}
