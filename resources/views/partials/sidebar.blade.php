<aside class="sidebar d-flex flex-column p-3">
  <a href="{{ route('dashboard.admin') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
    <span class="logo me-2">🪐</span>
    <span class="fs-5 fw-bold">Cosmiko</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto gap-1">
    <li class="nav-item">
      <a href="{{ route('dashboard.admin') }}" class="nav-link link-app {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">Dashboard</a>
    </li>
    <li><a href="{{ route('movimientos.index') }}" class="nav-link link-app {{ request()->routeIs('movimientos.*') ? 'active' : '' }}">Movimientos</a></li>
    @auth
      @if(auth()->user()->role === 'admin')
        <li><a href="{{ route('clientes.index') }}" class="nav-link link-app {{ request()->routeIs('clientes.*') ? 'active' : '' }}">Clientes</a></li>
        <li><a href="{{ route('empleados.index') }}" class="nav-link link-app {{ request()->routeIs('empleados.*') ? 'active' : '' }}">Empleados</a></li>
      @endif
    @endauth
  </ul>
  <hr>
  <div class="d-grid gap-2">
    <button id="themeToggle" class="btn btn-outline-theme">Cambiar tema</button>
    <form method="POST" action="{{ route('logout') }}">@csrf
      <button class="btn btn-theme w-100" type="submit">Salir</button>
    </form>
  </div>
</aside>
