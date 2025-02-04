<?php

namespace Database\Seeders;

use App\Models\variantproducts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantproductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        variantproducts::factory()->create();
    }
}
