<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validación básica
        $data = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string','min:6'],
        ]);

        // Buscar usuario
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->with('error', 'Credenciales inválidas')->withInput();
        }

        // Login + "remember me" opcional
        Auth::login($user, true);

        // Redirigir por rol
        return $user->role === 'admin'
            ? redirect()->route('dashboard.admin')
            : redirect()->route('dashboard.user');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Sesión cerrada');
    }
}
