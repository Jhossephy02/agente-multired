<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Cosmiko</title>

    <link href="{{ asset('css/login.css') }}" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <h2>Bienvenido 👋</h2>
        <p class="subtitle">Inicia sesión para continuar</p>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">Iniciar Sesión</button>
        </form>

        <div class="footer">
            <p>© 2025 Cosmiko - Todos los derechos reservados</p>
        </div>
    </div>
</div>

{{-- Pasar los mensajes de Laravel a JS --}}
<script>
    const loginMessages = {
        success: "{{ session('success') }}",
        error: "{{ session('error') }}"
    };
</script>

<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
