<?php

namespace Database\Seeders;

use App\Models\productdetail;
use Faker\Factory;
use Faker\Provider\Commerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductdetailSeeder extends Seeder
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
        foreach (range(1, 60) as $index) {
            $product = productdetail::factory()->create([
                'idproduct' => $faker->numberBetween(1, 20),
                'weight' => $faker->numberBetween(30, 2000),
                'size' => $faker->randomElement(['M', 'S', 'XL', 'None']),
                'color' => $faker->colorName(),
                'baseprice' => $faker->numberBetween(1000, 2000000),
                'sellprice' => $faker->numberBetween(1000, 2000000),
                'description' => $faker->paragraph(3),
                'image' => $faker->imageUrl(640, 480, 'product', true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
