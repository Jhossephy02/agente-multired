<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Cliente;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with('cliente')->latest()->paginate(10);
        $saldo = Movimiento::saldoActual();
        return view('movimientos.index', compact('movimientos','saldo'));
    }

    public function createDeposito()
    {
        $clientes = Cliente::all();
        return view('movimientos.deposito', compact('clientes'));
    }

    public function storeDeposito(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto'      => 'required|numeric|min:0.10',
            'cci'        => 'nullable|string|max:60',
            'dni'        => 'nullable|string|max:20',
            'telefono'   => 'nullable|string|max:30',
            'correo'     => 'nullable|email|max:120',
        ]);

        Movimiento::create([
            'tipo'       => 'deposito',
            'cliente_id' => $data['cliente_id'],
            'monto'      => $data['monto'],
            'cci'        => $data['cci'] ?? null,
            'dni'        => $data['dni'] ?? null,
            'telefono'   => $data['telefono'] ?? null,
            'correo'     => $data['correo'] ?? null,
            'estado'     => 'aprobado',
        ]);

        return redirect()->route('movimientos.index')->with('success','Depósito registrado.');
    }

    public function createRetiro()
    {
        $clientes = Cliente::all();
        $saldo = Movimiento::saldoActual();
        return view('movimientos.retiro', compact('clientes','saldo'));
    }

    public function storeRetiro(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto'      => 'required|numeric|min:0.10',
            'cci'        => 'nullable|string|max:60',
            'dni'        => 'nullable|string|max:20',
            'telefono'   => 'nullable|string|max:30',
            'correo'     => 'nullable|email|max:120',
        ]);

        $saldo = Movimiento::saldoActual();
        if ($data['monto'] > $saldo) {
            return back()->with('error', 'No hay saldo suficiente para realizar el retiro.');
        }

        Movimiento::create([
            'tipo'       => 'retiro',
            'cliente_id' => $data['cliente_id'],
            'monto'      => $data['monto'],
            'cci'        => $data['cci'] ?? null,
            'dni'        => $data['dni'] ?? null,
            'telefono'   => $data['telefono'] ?? null,
            'correo'     => $data['correo'] ?? null,
            'estado'     => 'aprobado',
        ]);

        return redirect()->route('movimientos.index')->with('success','Retiro registrado.');
    }

    public function pagoServicio()
    {
        $clientes = Cliente::all();
        return view('movimientos.pago_servicio', compact('clientes'));
    }

    public function storePagoServicio(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto'      => 'required|numeric|min:0.10',
            'referencia' => 'nullable|string|max:100',
        ]);

        Movimiento::create([
            'tipo'       => 'pago_servicio',
            'cliente_id' => $data['cliente_id'],
            'monto'      => $data['monto'],
            'referencia' => $data['referencia'] ?? null,
            'estado'     => 'aprobado',
        ]);

        return redirect()->route('movimientos.index')->with('success','Pago de servicio registrado.');
    }

    public function tramites()
    {
        $clientes = Cliente::all();
        return view('movimientos.tramites', compact('clientes'));
    }

    public function storeTramites(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto'      => 'required|numeric|min:0.10',
            'detalle'    => 'nullable|string|max:200',
        ]);

        Movimiento::create([
            'tipo'       => 'tramite',
            'cliente_id' => $data['cliente_id'],
            'monto'      => $data['monto'],
            'detalle'    => $data['detalle'] ?? null,
            'estado'     => 'pendiente',
        ]);

        return redirect()->route('movimientos.index')->with('success','Trámite registrado.');
    }

    public function updateEstado(Request $request, Movimiento $movimiento)
    {
        $request->validate([ 'estado' => 'required|in:pendiente,aprobado,rechazado' ]);
        $movimiento->update(['estado' => $request->estado]);
        return back()->with('success','Estado actualizado');
    }
}
