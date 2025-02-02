<?php

namespace Database\Seeders;

use App\Models\product;
use App\Models\User;
use Faker\Factory;
use Faker\Provider\Commerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::hasRoles('store')->inRandomOrder()->first();

        $faker = Factory::create();
        $fakerproduct = Factory::create();
        $fakerproduct->addProvider(new Commerce($fakerproduct));

        foreach (range(1, 20) as $index) {
            $product = product::factory()->create([
                'nameproduct' => $fakerproduct->productname(),
                'idcategory' => $faker->numberBetween(1, 10),
                'iduser' => $user->id,
                'description' => $faker->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
