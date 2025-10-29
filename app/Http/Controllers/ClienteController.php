
<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create() {
        return view('clientes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'foto' => 'nullable|image'
        ]);

        if($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        Cliente::create($data);
        return redirect()->route('clientes.index')->with('success','Cliente creado');
    }

    public function edit(Cliente $cliente) {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente) {
        $data = $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'foto' => 'nullable|image'
        ]);

        if($request->hasFile('foto')) {
            if($cliente->foto) Storage::disk('public')->delete($cliente->foto);
            $data['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        $cliente->update($data);
        return redirect()->route('clientes.index')->with('success','Cliente actualizado');
    }

    public function destroy(Cliente $cliente) {
        if($cliente->foto) Storage::disk('public')->delete($cliente->foto);
        $cliente->delete();
        return back()->with('success','Cliente eliminado');
    }
}
