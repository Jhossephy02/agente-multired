<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        // Evita duplicar si corres varias veces (ajusta criterios según tus columnas únicas)
        if (Cliente::count() === 0) {
            Cliente::factory()->count(20)->create();
        }
    }
}
