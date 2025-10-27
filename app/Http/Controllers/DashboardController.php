<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Movimiento;
use App\Models\Tramite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Dashboard de administrador
     */
    public function admin()
    {
        $hoy = Carbon::today();
        $mesActual = $hoy->month;

        $stats = [
            'total_clientes' => Cliente::count(),
            'total_empleados' => Empleado::count(),
            'total_usuarios' => User::count(),
            'movimientos_mes' => Movimiento::whereMonth('fecha', $mesActual)->count(),
            'tramites_mes' => Tramite::whereMonth('fecha', $mesActual)->count(),
        ];

        return view('dashboards.admin', compact('stats'));
    }

    /**
     * Dashboard de empleado/usuario
     */
    public function user()
    {
        $user = Auth::user();

        $stats = [
            'mis_clientes' => Cliente::where('empleado_id', $user->id)->count(),
            'mis_movimientos' => Movimiento::where('usuario_id', $user->id)
                                ->orderBy('fecha', 'desc')
                                ->take(10)
                                ->get(),
            'mis_tramites' => Tramite::where('usuario_id', $user->id)
                                ->whereMonth('fecha', Carbon::now()->month)
                                ->count()
        ];

        return view('dashboards.user', compact('stats', 'user'));
    }

    /**
     * Obtener KPIs generales para API
     */
    public function getKPIs()
    {
        $mesActual = Carbon::now()->month;

        $kpis = [
            'total_clientes' => Cliente::count(),
            'total_empleados' => Empleado::count(),
            'movimientos_mes' => Movimiento::whereMonth('fecha', $mesActual)->count(),
            'tramites_mes' => Tramite::whereMonth('fecha', $mesActual)->count(),
        ];

        return response()->json([
            'success' => true,
            'kpis' => $kpis
        ]);
    }
}
