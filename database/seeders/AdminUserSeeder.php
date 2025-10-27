<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cosmiko.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@cosmiko.com',
                'password' => Hash::make('password123'), // Cambia esto
                'role' => 'admin',
            ]
        );
    }
}