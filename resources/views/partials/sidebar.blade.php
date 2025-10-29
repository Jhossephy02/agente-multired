<aside class="sidebar">
  <div class="sidebar-header">
    <div class="sidebar-title">Cosmiko</div>
    <div class="sidebar-sub">{{ auth()->user()->name ?? '' }} — {{ auth()->user()->role ?? '' }}</div>
  </div>

  <nav class="sidebar-menu">
    <a class="sidebar-link" href="{{ auth()->user() && auth()->user()->role === 'admin' ? route('dashboard.admin') : route('dashboard.empleado') }}">
      <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
    </a>

    <a class="sidebar-link" href="{{ route('movimientos.index') }}">
      <i class="bi bi-arrow-left-right"></i> <span>Movimientos</span>
    </a>

    @if(auth()->check() && auth()->user()->role === 'admin')
    <a class="sidebar-link" href="{{ route('clientes.index') }}">
      <i class="bi bi-people"></i> <span>Clientes</span>
    </a>

    <a class="sidebar-link" href="{{ route('empleados.index') }}">
      <i class="bi bi-person-badge"></i> <span>Empleados</span>
    </a>
    @endif
  </nav>

  <div class="sidebar-footer">
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="btn w-full">Salir</button>
    </form>
  </div>
</aside>
