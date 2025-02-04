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
        productdetail::factory(20)->create();
    }
}
