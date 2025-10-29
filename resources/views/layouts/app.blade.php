<!DOCTYPE html>
<html lang="es" class="dark" data-palette="astropay">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cosmiko | @yield('title', 'Panel')</title>
  @vite(['resources/css/app.css', 'resources/js/layouts/theme.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="layout">
    @include('partials.sidebar')
    <main class="content">
      @yield('content')
    </main>
  </div>
</body>
</html>
