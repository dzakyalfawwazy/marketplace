<?php

namespace Database\Seeders;

use App\Models\categories;
use Faker\Factory;
use Faker\Provider\Commerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();
        $fakerproduct = Factory::create();
        $fakerproduct->addProvider(new Commerce($fakerproduct));

        foreach (range(1, 10) as $index) {
            $product = categories::factory()->create([
                'categoriesname' => $fakerproduct->category(),
                'icon' => $faker->randomElement(['fa-box',           // Product Box 📦
                            'fa-shopping-cart', // Shopping Cart 🛒
                            'fa-tags',         // Price Tags 🏷️
                            'fa-dollar-sign',  // Price / Money 💰
                            'fa-store',        // Store / Shop 🏬
                            'fa-tag',          // Label / Tag 🔖
                            'fa-chart-line',   // Product Analytics 📊
                            'fa-truck',        // Delivery / Truck 🚛
                            'fa-star',         // Product Rating ⭐
                            'fa-gift'   ]),
                'remarks' => $faker->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
