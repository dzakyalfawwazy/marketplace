<?php

namespace Database\Seeders;

use App\Models\product;
use App\Models\User;
use Faker\Factory;
use Faker\Provider\Commerce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::role('store')->inRandomOrder()->first();

        $faker = Factory::create();
        $fakerproduct = Factory::create();
        $fakerproduct->addProvider(new Commerce($fakerproduct));

        foreach (range(1, 20) as $index) {
            $product = product::factory()->create([
                'name' => $fakerproduct->productname(),
                'user_id' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
