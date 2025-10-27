<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    /**
     * Mostrar lista de empleados
     */
    public function index()
    {
        $empleados = User::where('role', 'empleado')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Mostrar formulario de crear empleado
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Guardar nuevo empleado
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'empleado',
        ]);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado exitosamente');
    }

    /**
     * Mostrar empleado específico
     */
    public function show(User $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Mostrar formulario de editar
     */
    public function edit(User $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Actualizar empleado
     */
    public function update(Request $request, User $empleado)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $empleado->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $empleado->name = $request->name;
        $empleado->email = $request->email;
        
        if ($request->filled('password')) {
            $empleado->password = Hash::make($request->password);
        }
        
        $empleado->save();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Eliminar empleado
     */
    public function destroy(User $empleado)
    {
        $empleado->delete();
        
        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente');
    }
}