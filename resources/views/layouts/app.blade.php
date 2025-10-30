@php($theme = request()->cookie('cosmiko_theme', 'dark'))
<!DOCTYPE html>
<html lang="es" data-theme="{{ $theme }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','COSMIKO')</title>

  {{-- Bootstrap (para layouts rápidos) --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  {{-- Tailwind si ya lo usas (opcional) --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body class="app-body">
  <header class="app-header glass shadow-sm">
    <div class="d-flex align-items-center gap-2">
      <button id="sidebarToggle" class="btn btn-outline-light btn-sm"><i class="bi bi-list"></i></button>
      <div class="brand">
        <span class="orbita"></span>
        <strong class="brand-text">COSMIKO</strong>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <button id="themeToggle" class="btn btn-outline-light btn-sm" title="Alternar tema">
        <i class="bi bi-moon-stars" id="themeIcon"></i>
      </button>
      <form action="{{ route('logout') }}" method="POST" class="m-0">@csrf
        <button class="btn btn-danger btn-sm"><i class="bi bi-box-arrow-right me-1"></i>Salir</button>
      </form>
    </div>
  </header>

  @include('partials.sidebar')

  <main class="app-main container-fluid py-3">
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/theme.js') }}"></script>
  @stack('scripts')
</body>
</html>
