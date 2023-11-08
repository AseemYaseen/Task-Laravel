<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create the first user (non-admin)
        User::factory()->create([
            'name' => 'Aseem',
            'email' => 'aseem@gmail.com',
            'password' => Hash::make('asem@12345'),
            'is_admin' => 0,
        ]);

        // Create the second user (admin)
        User::factory()->create([
            'name' => 'Najeem',
            'email' => 'najeem@gmail.com',
            'password' => Hash::make('najeem@12345'),
            'is_admin' => 1,
        ]);
    }
}