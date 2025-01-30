<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@windesheim.nl',
            'password' => Hash::make('Windesheim2025!'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Planner User',
            'email' => 'planner@windesheim.nl',
            'password' => Hash::make('Windesheim2025!'),
            'role' => 'planner',
        ]);

        User::create([
            'name' => 'Gast User',
            'email' => 'gast@windesheim.nl',
            'password' => Hash::make('Windesheim2025!'),
            'role' => 'gast',
        ]);
    }
}