<!DOCTYPE html>
<html lang="es" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cosmiko')</title>
    <link rel="stylesheet" href="{{ asset('css/halloween.css') }}">
    <script defer src="{{ asset('js/theme.js') }}"></script>
</head>
<body class="app theme-dark">
    <header class="topbar">
        <div class="brand">
            <span class="pumpkin-logo" aria-hidden="true">🎃</span>
            <span class="brand-text">Cosmiko</span>
        </div>
        <div class="top-actions">
            <button id="themeToggle" class="toggle-theme" aria-label="Cambiar tema"></button>
            <form action="{{ route('logout') }}" method="GET" style="display:inline">
                <button class="btn ghost">Salir</button>
            </form>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>
