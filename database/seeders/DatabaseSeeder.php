<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // This user is not Admin
        User::factory()->create([
            'name' => 'Aseem',
            'email' => 'aseem@gmail.com',
            'password' => Hash::make('Asem@12345'),
            'is_admin' => 0,
        ]);

        // This user is the Admin 
        User::factory()->create([
            'name' => 'Najeem',
            'email' => 'najeem@gmail.com',
            'password' => Hash::make('Najeem@12345'),
            'is_admin' => 1,
        ]);
    }
}