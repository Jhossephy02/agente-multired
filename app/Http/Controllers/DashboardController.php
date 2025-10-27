<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Dashboard de administrador
    public function admin()
    {
        $stats = [
            'total_clientes' => Cliente::count(),
            'total_empleados' => User::where('role', 'empleado')->count(),
            'total_usuarios' => User::count(),
        ];

        return view('dashboards.admin', compact('stats'));
    }

    // Dashboard de empleado/usuario
    public function user()
    {
        $user = Auth::user();
        
        $stats = [
            'total_clientes' => Cliente::count(),
        ];

        return view('dashboards.user', compact('stats', 'user'));
    }
}