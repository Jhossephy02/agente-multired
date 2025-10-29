<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Cliente;

class MovimientoController extends Controller
{
    public function index() {
        $movimientos = Movimiento::with('cliente')->latest()->paginate(10);
        return view('movimientos.index', compact('movimientos'));
    }

    public function createDeposito() {
        $clientes = Cliente::all();
        return view('movimientos.deposito', compact('clientes'));
    }

    public function storeDeposito(Request $request) {
        $request->validate([
            'cliente_id' => 'required',
            'monto' => 'required|numeric',
            'cci' => 'nullable|string',
        ]);
        Movimiento::create([
            'tipo' => 'deposito',
            'cliente_id' => $request->cliente_id,
            'monto' => $request->monto,
            'cci' => $request->cci,
            'estado' => 'pendiente'
        ]);
        return redirect()->route('movimientos.index')->with('success','Depósito registrado');
    }

    public function createRetiro() {
        $clientes = Cliente::all();
        return view('movimientos.retiro', compact('clientes'));
    }

    public function storeRetiro(Request $request) {
        $request->validate([
            'cliente_id' => 'required',
            'monto' => 'required|numeric',
            'cci' => 'nullable|string',
        ]);
        Movimiento::create([
            'tipo' => 'retiro',
            'cliente_id' => $request->cliente_id,
            'monto' => $request->monto,
            'cci' => $request->cci,
            'estado' => 'pendiente'
        ]);
        return redirect()->route('movimientos.index')->with('success','Retiro registrado');
    }

    public function updateEstado(Request $request, Movimiento $movimiento) {
        $movimiento->update(['estado' => $request->estado]);
        return back()->with('success','Estado actualizado');
    }
}
