<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    // Saldo global del sistema (depósitos suman, retiros/pagos/trámites restan)
    public static function obtenerSaldoActual()
    {
        return (float) Movimiento::sum(DB::raw("
            CASE 
                WHEN tipo = 'deposito' THEN monto
                WHEN tipo = 'retiro' THEN -monto
                WHEN tipo = 'pago_servicio' THEN -monto
                WHEN tipo = 'tramite' THEN -monto
            END
        "));
    }

    public function index() {
        $movimientos = Movimiento::with('cliente')->latest()->paginate(10);
        $saldo = self::obtenerSaldoActual();
        return view('movimientos.index', compact('movimientos','saldo'));
    }

    // ===== Depósito
    public function createDeposito() {
        $clientes = Cliente::all();
        return view('movimientos.deposito', compact('clientes'));
    }

    public function storeDeposito(Request $request) {
        $request->validate([
            'cliente_id' => 'required|integer',
            'monto' => 'required|numeric|min:1',
            'cci' => 'nullable|string|max:60',
            'dni' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:30',
            'correo' => 'nullable|email|max:120',
        ]);

        Movimiento::create([
            'tipo' => 'deposito',
            'cliente_id' => $request->cliente_id,
            'monto' => $request->monto,
            'cci' => $request->cci,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'estado' => 'aprobado',
        ]);

        return redirect()->route('movimientos.index')->with('success','Depósito registrado correctamente.');
    }

    // ===== Retiro
    public function createRetiro() {
        $clientes = Cliente::all();
        $saldo = self::obtenerSaldoActual();
        return view('movimientos.retiro', compact('clientes','saldo'));
    }

    public function storeRetiro(Request $request) {
        $request->validate([
            'cliente_id' => 'required|integer',
            'monto' => 'required|numeric|min:1',
            'cci' => 'nullable|string|max:60',
            'dni' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:30',
            'correo' => 'nullable|email|max:120',
        ]);

        $saldo = self::obtenerSaldoActual();
        if ($request->monto > $saldo) {
            return back()->with('error', 'No hay saldo suficiente para realizar el retiro.');
        }

        Movimiento::create([
            'tipo' => 'retiro',
            'cliente_id' => $request->cliente_id,
            'monto' => $request->monto,
            'cci' => $request->cci,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'estado' => 'aprobado',
        ]);

        return redirect()->route('movimientos.index')->with('success','Retiro registrado.');
    }

    // ===== Pago de servicio (stub)
    public function pagoServicio() {
        $clientes = Cliente::all();
        return view('movimientos.pago_servicio', compact('clientes'));
    }

    public function storePagoServicio(Request $request) {
        $request->validate([
            'cliente_id' => 'required|integer',
            'monto' => 'required|numeric|min:1',
            'referencia' => 'nullable|string|max:100',
        ]);

        Movimiento::create([
            'tipo' => 'pago_servicio',
            'cliente_id' => $request->cliente_id,
            'monto' => $request->monto,
            'referencia' => $request->referencia,
            'estado' => 'aprobado',
        ]);

        return redirect()->route('movimientos.index')->with('success','Pago de servicio registrado.');
    }

    // ===== Tramites (stub)
    public function tramites() {
        $clientes = Cliente::all();
        return view('movimientos.tramites', compact('clientes'));
    }

    public function storeTramites(Request $request) {
        $request->validate([
            'cliente_id' => 'required|integer',
            'monto' => 'required|numeric|min:1',
            'detalle' => 'nullable|string|max:200',
        ]);

        Movimiento::create([
            'tipo' => 'tramite',
            'cliente_id' => $request->cliente_id,
            'monto' => $request->monto,
            'detalle' => $request->detalle,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('movimientos.index')->with('success','Trámite registrado.');
    }

    // ===== Cambiar estado
    public function updateEstado(Request $request, Movimiento $movimiento) {
        $request->validate([ 'estado' => 'required|in:pendiente,aprobado,rechazado' ]);
        $movimiento->update(['estado' => $request->estado]);
        return back()->with('success','Estado actualizado');
    }
}
