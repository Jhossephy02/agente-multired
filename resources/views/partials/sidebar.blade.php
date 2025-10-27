{{-- resources/views/partials/sidebar.blade.php --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="logo" onclick="window.location.href='{{ route('dashboard') }}'">
            <img src="{{ asset('images/logo_14083016.png') }}" alt="Cosmiko" style="height: 2rem;">
        </button>
        <button class="toggle-btn" onclick="toggleSidebar()">
            <svg id="menuIcon" viewBox="0 0 24 24" stroke="currentColor" fill="none">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <div class="sidebar-user">
        <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
        <div class="user-info">
            <div class="name">{{ Auth::user()->name }}</div>
            <div class="role">{{ Auth::user()->role ?? 'Usuario' }}</div>
        </div>
    </div>

    <nav class="sidebar-menu">
        @if(Auth::user()->role === 'admin')
            {{-- Menú Administrador --}}
            <a href="{{ route('dashboard.admin') }}" class="menu-item {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 002 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('clientes.index') }}" class="menu-item {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Clientes</span>
            </a>

            <a href="{{ route('empleados.index') }}" class="menu-item {{ request()->routeIs('empleados.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Empleados</span>
            </a>
        @else
            {{-- Menú Usuario --}}
            <a href="{{ route('dashboard.user') }}" class="menu-item {{ request()->routeIs('dashboard.user') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 002 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Mi Dashboard</span>
            </a>
        @endif

        {{-- Menú Común --}}
        <a href="{{ route('movimientos.deposito') }}" class="menu-item {{ request()->routeIs('movimientos.deposito') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Depósitos</span>
        </a>

        <a href="{{ route('movimientos.retiro') }}" class="menu-item {{ request()->routeIs('movimientos.retiro') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                <path d="M20 12H4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Retiros</span>
        </a>

        <a href="{{ route('movimientos.pago-servicio') }}" class="menu-item {{ request()->routeIs('movimientos.pago-servicio') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                <path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Pago de Servicios</span>
        </a>

        <a href="{{ route('movimientos.tramites') }}" class="menu-item {{ request()->routeIs('movimientos.tramites') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Trámites</span>
        </a>
    </nav>

    <div class="sidebar-logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Cerrar Sesión</span>
            </button>
        </form>
    </div>
</div>

<style>
/* Estilos del Sidebar */
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 256px;
    height: 100vh;
    background: white;
    border-right: 1px solid #e5e7eb;
    display: flex;
    flex-direction: column;
    z-index: 100;
    transition: transform 0.2s ease;
}

.sidebar.collapsed {
    transform: translateX(-100%);
}

.sidebar-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: #3b82f6;
    background: none;
    border: none;
    cursor: pointer;
}

.toggle-btn {
    width: 2.5rem;
    height: 2.5rem;
    border: none;
    background: #f3f4f6;
    border-radius: 0.5rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.toggle-btn:hover {
    background: #e5e7eb;
}

.toggle-btn svg {
    width: 1.25rem;
    height: 1.25rem;
    stroke-width: 2;
}

.sidebar-user {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1.5rem;
    border-bottom: 1px solid #e5e7eb;
}

.avatar {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.875rem;
}

.user-info .name {
    font-weight: 600;
    font-size: 0.875rem;
    color: #111827;
}

.user-info .role {
    font-size: 0.75rem;
    color: #6b7280;
}

.sidebar-menu {
    flex: 1;
    padding: 1rem;
    overflow-y: auto;
}

.menu-item {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border: none;
    background: none;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    margin-bottom: 0.25rem;
}

.menu-item:hover {
    background: #f3f4f6;
    color: #111827;
}

.menu-item.active {
    background: #3b82f6;
    color: white;
}

.menu-item svg {
    width: 1.25rem;
    height: 1.25rem;
    stroke-width: 2;
}

.sidebar-logout {
    padding: 1rem;
    border-top: 1px solid #e5e7eb;
}

.logout-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border: none;
    background: none;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #ef4444;
    cursor: pointer;
    transition: all 0.2s;
}

.logout-btn:hover {
    background: #fee2e2;
}

.logout-btn svg {
    width: 1.25rem;
    height: 1.25rem;
    stroke-width: 2;
}

@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }
    
    .sidebar.show {
        transform: translateX(0);
    }
}
</style>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('collapsed');
    document.querySelector('.main-content')?.classList.toggle('expanded');
}
</script>