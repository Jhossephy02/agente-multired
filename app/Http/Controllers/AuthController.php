<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            // Si el usuario tiene campo 'role', redirigir por rol, sino admin por defecto
            $role = Auth::user()->role ?? 'admin';
            return $role === 'admin'
                ? redirect()->route('dashboard.admin')->with('success', '¡Bienvenido de vuelta!')
                : redirect()->route('dashboard.user')->with('success', '¡Bienvenido de vuelta!');
        }

        return back()->with('error', 'Credenciales inválidas');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    }
}
