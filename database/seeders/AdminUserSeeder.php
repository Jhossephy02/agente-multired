<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!DB::table('users')->where('email', 'admin@cosmiko.test')->exists()) {
            DB::table('users')->insert([
                'name' => 'Admin Cosmiko',
                'email' => 'admin@cosmiko.test',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (!DB::table('users')->where('email', 'user@cosmiko.test')->exists()) {
            DB::table('users')->insert([
                'name' => 'Trabajador',
                'email' => 'user@cosmiko.test',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
