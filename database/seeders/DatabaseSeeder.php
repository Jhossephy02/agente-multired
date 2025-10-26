<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aquí llamamos a todos los seeders
        $this->call([
    ClienteSeeder::class,
]);

        // Creamos un usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('1234'), // Cambia 'password' por la contraseña que desees
        ]);
    }
}
