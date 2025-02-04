<?php

namespace Database\Seeders;

use App\Models\productsimages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsimagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        productsimages::factory(25)->create();
    }
}
