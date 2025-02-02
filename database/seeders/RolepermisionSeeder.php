<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolepermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ownerRole = Role::create([
            'name' => 'owner',
        ]);
        $buyerRole = Role::create([
            'name' => 'buyer',
        ]);
        $storeRole = Role::create([
            'name' => 'store',
        ]);

         $user = User::factory()->create([
            'name' => 'JACK',
            'password' => Hash::make('password'),
            'email' => 'owner@example.com',
        ]);
        $user->assignRole($ownerRole);

        $user = User::factory()->create([
            'name' => 'store',
            'password' => Hash::make('password'),
            'email' => 'store@example.com',
        ]);
        $user->assignRole($storeRole);

    }
}
