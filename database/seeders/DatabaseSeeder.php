<?php

namespace Database\Seeders;

use App\Models\categories;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'JACK',
        //     'password' => Hash::make('password'),
        //     'email' => 'test@example.com',
        // ]);
        $this ->call(RolepermisionSeeder::class);
        $this ->call(CategorySeeder::class);
        $this ->call(ProductSeeder::class);
        $this ->call(ProductdetailSeeder::class);

        // categories::factory()->count(10)->create();
    }
}
