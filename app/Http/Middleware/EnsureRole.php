<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        // Ajusta según cómo guardas el rol (columna 'role' en users)
        if ($user->role !== $role) {
            return redirect()
                ->route('dashboard.user')
                ->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}
