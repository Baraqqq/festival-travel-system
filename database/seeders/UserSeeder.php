<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Controleer of de gebruiker al bestaat
        if (!User::where('email', 'admin@windesheim.nl')->exists()) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@windesheim.nl',
                'password' => Hash::make('Windesheim2025!'),
                'role' => 'admin',
            ]);
        }

        if (!User::where('email', 'planner@windesheim.nl')->exists()) {
            User::create([
                'name' => 'Planner User',
                'email' => 'planner@windesheim.nl',
                'password' => Hash::make('Windesheim2025!'),
                'role' => 'planner',
            ]);
        }

        if (!User::where('email', 'gast@windesheim.nl')->exists()) {
            User::create([
                'name' => 'Gast User',
                'email' => 'gast@windesheim.nl',
                'password' => Hash::make('Windesheim2025!'),
                'role' => 'gast',
            ]);
        }
    }
}