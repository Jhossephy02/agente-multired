<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run(): void
{
    \App\Models\User::create([
        'name' => 'Administrador General',
        'email' => 'admin@cosmiko.com',
        'password' => bcrypt('admin123'),
        'role' => 'admin'
    ]);
    \App\Models\User::create([
    'name' => 'Empleado Prueba',
    'email' => 'empleado@cosmiko.com',
    'password' => bcrypt('empleado123'),
    'role' => 'empleado'
]);

    // Aquí puedes agregar más seeders si es necesario
}
}       

