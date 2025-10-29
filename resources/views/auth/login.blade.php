<!DOCTYPE html>
<html lang="es" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmiko | Iniciar Sesión 🎃</title>
    <link rel="stylesheet" href="{{ asset('css/halloween.css') }}">
    <script defer src="{{ asset('js/theme.js') }}"></script>
</head>
<body class="auth theme-dark">
    <div class="login-wrap">
        <div class="login-card">
            <div class="login-head">
                <div class="logo">🎃</div>
                <h1>Bienvenido a Cosmiko</h1>
                <p>La noche está oscura... pero el sistema no 👻</p>
            </div>

            @if (session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="form">
                @csrf
                <label class="field">
                    <span>Correo electrónico</span>
                    <input type="email" name="email" placeholder="admin@cosmiko.test" required>
                </label>
                <label class="field">
                    <span>Contraseña</span>
                    <input type="password" name="password" placeholder="••••••••" required>
                </label>

                <div class="actions">
                    <button class="btn primary w-full">Iniciar sesión</button>
                </div>
            </form>

            <div class="foot">
                <button id="themeToggle" class="toggle-theme">Cambiar a modo claro</button>
                <p class="copy">© 2025 Cosmiko — Edición Halloween</p>
            </div>
        </div>
    </div>
    <div class="bats" aria-hidden="true"></div>
</body>
</html>
