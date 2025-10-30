<aside id="sidebar" class="sidebar glass shadow-sm">
  <nav class="menu">
    <a href="{{ route('dashboard.admin') }}" class="menu-link">
      <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
    </a>
    <a href="{{ route('movimientos.index') }}" class="menu-link">
      <i class="bi bi-arrow-left-right"></i> <span>Movimientos</span>
    </a>
    @can('admin-only'){{-- si usas gates/policies --}}
    <a href="{{ route('clientes.index') }}" class="menu-link">
      <i class="bi bi-person-vcard"></i> <span>Clientes</span>
    </a>
    <a href="{{ route('empleados.index') }}" class="menu-link">
      <i class="bi bi-people"></i> <span>Empleados</span>
    </a>
    @endcan
    <div class="menu-section mt-2 text-uppercase small text-muted">Acciones</div>
    <a href="{{ route('movimientos.deposito') }}" class="menu-link">
      <i class="bi bi-cash-coin"></i> <span>Depositar</span>
    </a>
    <a href="{{ route('movimientos.retiro') }}" class="menu-link">
      <i class="bi bi-wallet2"></i> <span>Retirar</span>
    </a>
    <a href="{{ route('movimientos.pago_servicio') }}" class="menu-link">
      <i class="bi bi-receipt"></i> <span>Pago Serv.</span>
    </a>
    <a href="{{ route('movimientos.tramites') }}" class="menu-link">
      <i class="bi bi-clipboard2-check"></i> <span>Trámites</span>
    </a>
  </nav>
</aside>
