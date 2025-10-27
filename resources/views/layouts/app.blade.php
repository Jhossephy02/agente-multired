{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard - Cosmiko')

@section('content')
<div class="app">
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <button class="logo" onclick="changePage('dashboard')">Cosmiko</button>
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
                <div class="role">{{ Auth::user()->role }}</div>
            </div>
        </div>

        <nav class="sidebar-menu">
            <button class="menu-item active" data-page="dashboard" onclick="changePage('dashboard')">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 002 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Panel de Control</span>
            </button>
            <button class="menu-item" data-page="clientes" onclick="changePage('clientes')">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Clientes</span>
            </button>
            <button class="menu-item" data-page="movimientos" onclick="changePage('movimientos')">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Movimientos</span>
            </button>
            <button class="menu-item" data-page="reportes" onclick="changePage('reportes')">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Reportes</span>
            </button>
            <button class="menu-item" data-page="configuracion" onclick="changePage('configuracion')">
                <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Configuración</span>
            </button>
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

    <!-- MAIN CONTENT -->
    <div class="main-content" id="mainContent">
        <!-- DASHBOARD PAGE -->
        <div id="page-dashboard" class="page-content">
            <div class="header">
                <div class="header-left">
                    <h1>Panel de Control</h1>
                </div>
                <div class="header-date" id="currentDate"></div>
            </div>

            <div class="dashboard-container">
                <div class="dashboard-header">
                    <div>
                        <h2>Resumen General</h2>
                    </div>
                    <div style="display: flex; gap: 1rem;">
                        <button class="btn btn-success" onclick="changePage('deposito')">
                            <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                                <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Depositar
                        </button>
                        <button class="btn btn-primary" onclick="changePage('retiro')">
                            <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                                <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Retirar
                        </button>
                    </div>
                </div>

                <div class="kpi-grid" id="kpiGrid">
                    <!-- KPI Cards se cargarán dinámicamente -->
                </div>
            </div>
        </div>

        <!-- RETIRO PAGE -->
        <div id="page-retiro" class="page-content" style="display: none;">
            <div class="header">
                <div class="header-left">
                    <button class="back-btn" onclick="changePage('dashboard')">
                        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <h1>Registrar Retiro</h1>
                </div>
                <div class="header-date" id="currentDate2"></div>
            </div>

            <div class="dashboard-container">
                <div class="form-container">
                    <form id="formRetiro">
                        @csrf
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control" name="cliente_id" id="clienteRetiro" required>
                                <option value="">Seleccionar cliente...</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Cuenta Destino</label>
                            <select class="form-control" name="cuenta_destino" required>
                                <option value="">Seleccionar cuenta...</option>
                                <option value="yape">Yape</option>
                                <option value="bbva">BBVA</option>
                                <option value="bcp">BCP</option>
                                <option value="interbank">Interbank</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Monto</label>
                            <input type="number" class="form-control" name="monto" placeholder="0.00" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-cancel" onclick="changePage('dashboard')">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Registrar Retiro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- DEPOSITO PAGE -->
        <div id="page-deposito" class="page-content" style="display: none;">
            <div class="header">
                <div class="header-left">
                    <button class="back-btn" onclick="changePage('dashboard')">
                        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <h1>Registrar Depósito</h1>
                </div>
                <div class="header-date" id="currentDate3"></div>
            </div>

            <div class="dashboard-container">
                <div class="form-container">
                    <form id="formDeposito">
                        @csrf
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control" name="cliente_id" id="clienteDeposito" required>
                                <option value="">Seleccionar cliente...</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Monto</label>
                            <input type="number" class="form-control" name="monto" placeholder="0.00" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label>Método de Pago</label>
                            <select class="form-control" name="metodo_pago" required>
                                <option value="">Seleccionar método...</option>
                                <option value="yape">Yape</option>
                                <option value="transferencia">Transferencia</option>
                                <option value="efectivo">Efectivo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Referencia</label>
                            <input type="text" class="form-control" name="referencia" placeholder="Número de operación">
                        </div>

                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-cancel" onclick="changePage('dashboard')">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-success">
                                Registrar Depósito
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- OTRAS PÁGINAS -->
        <div id="page-clientes" class="page-content" style="display: none;">
            <div class="header">
                <div class="header-left">
                    <h1>Clientes</h1>
                </div>
            </div>
            <div class="dashboard-container">
                <div class="form-container">
                    <h2>Módulo en desarrollo...</h2>
                    <p>Próximamente podrás gestionar tus clientes desde aquí.</p>
                </div>
            </div>
        </div>

        <div id="page-movimientos" class="page-content" style="display: none;">
            <div class="header">
                <div class="header-left">
                    <h1>Movimientos</h1>
                </div>
            </div>
            <div class="dashboard-container">
                <div class="form-container">
                    <h2>Módulo en desarrollo...</h2>
                    <p>Próximamente podrás ver todos los movimientos desde aquí.</p>
                </div>
            </div>
        </div>

        <div id="page-reportes" class="page-content" style="display: none;">
            <div class="header">
                <div class="header-left">
                    <h1>Reportes</h1>
                </div>
            </div>
            <div class="dashboard-container">
                <div class="form-container">
                    <h2>Módulo en desarrollo...</h2>
                    <p>Próximamente podrás generar reportes desde aquí.</p>
                </div>
            </div>
        </div>

        <div id="page-configuracion" class="page-content" style="display: none;">
            <div class="header">
                <div class="header-left">
                    <h1>Configuración</h1>
                </div>
            </div>
            <div class="dashboard-container">
                <div class="form-container">
                    <h2>Módulo en desarrollo...</h2>
                    <p>Próximamente podrás configurar el sistema desde aquí.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush