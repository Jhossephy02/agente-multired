<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Tramite;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'clientesCount' => Cliente::count(),
            'empleadosCount' => Empleado::count(),
            'tramitesCount' => Tramite::count(),
        ]);
    }
}

