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
                'name' => $fakerproduct->category(),
                'desc' => $faker->paragraph(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
