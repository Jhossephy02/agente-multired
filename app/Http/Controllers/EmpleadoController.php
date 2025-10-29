<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    // LISTA
    public function index()
    {
        $empleados = User::where('role', 'empleado')->get();
        return view('empleados.index', compact('empleados'));
    }

    // FORMULARIO CREAR
    public function create()
    {
        return view('empleados.create');
    }

    // GUARDAR NUEVO
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'empleado',
        ]);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado correctamente.');
    }

    // FORMULARIO EDITAR
    public function edit(User $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    // ACTUALIZAR
    public function update(Request $request, User $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $empleado->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $empleado->name = $request->input('nombre');
        $empleado->email = $request->input('email');

        if ($request->filled('password')) {
            $empleado->password = Hash::make($request->input('password'));
        }

        $empleado->save();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    // ELIMINAR
    public function destroy(User $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
