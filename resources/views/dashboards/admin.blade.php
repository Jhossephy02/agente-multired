{{-- resources/views/dashboards/admin.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard Administrador - Cosmiko')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
<style>
body {
    font-family: 'Inter', sans-serif;
    background: #f9fafb;
    margin: 0;
}

.app-container {
    display: flex;
    min-height: 100vh;
}

.main-content {
    flex: 1;
    margin-left: 256px;
    transition: margin-left 0.2s ease;
}

.main-content.expanded {
    margin-left: 0;
}

.header {
    background: white;
    border-bottom: 1px solid #e5e7eb;
    padding: 1.5rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h1 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #111827;
    margin: 0;
}

.header-date {
    font-size: 0.875rem;
    color: #6b7280;
}

.dashboard-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
}

.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.dashboard-header h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
    margin: 0;
}

.action-buttons {
    display: flex;
    gap: 1rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    border: none;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
}

.btn-primary {
    background: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background: #2563eb;
    transform: translateY(-1px);
}

.btn-success {
    background: #10b981;
    color: white;
}

.btn-success:hover {
    background: #059669;
    transform: translateY(-1px);
}

.btn svg {
    width: 1rem;
    height: 1rem;
    stroke-width: 2;
}

/* KPI Cards */
.kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.kpi-card {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    border: 1px solid #e5e7eb;
    transition: all 0.2s;
}

.kpi-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.kpi-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.kpi-icon {
    width: 3rem;
    height: 3rem;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.kpi-icon.blue {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.kpi-icon.green {
    background: linear-gradient(135deg, #10b981, #059669);
}

.kpi-icon.purple {
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
}

.kpi-icon.orange {
    background: linear-gradient(135deg, #f59e0b, #d97706);
}

.kpi-icon svg {
    width: 1.5rem;
    height: 1.5rem;
    color: white;
    stroke: white;
}

.kpi-change {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.875rem;
    font-weight: 600;
}

.kpi-change.positive {
    color: #10b981;
}

.kpi-change.negative {
    color: #ef4444;
}

.kpi-change svg {
    width: 1rem;
    height: 1rem;
}

.kpi-card-body h3 {
    color: #6b7280;
    font-size: 0.875rem;
    font-weight: 500;
    margin: 0 0 0.5rem 0;
}

.kpi-value {
    font-size: 1.875rem;
    font-weight: 700;
    color: #111827;
    margin: 0;
}

/* Loading Skeleton */
.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s ease-in-out infinite;
    border-radius: 0.5rem;
    height: 2rem;
}

@keyframes loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

@media (max-width: 768px) {
    .main-content {
        margin-left: 0;
    }
    
    .dashboard-container {
        padding: 1rem;
    }
    
    .kpi-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('content')
<div class="app-container">
    @include('partials.sidebar')
    
    <div class="main-content" id="mainContent">
        <div class="header">
            <h1>Panel de Control - Administrador</h1>
            <div class="header-date" id="currentDate"></div>
        </div>

        <div class="dashboard-container">
            <div class="dashboard-header">
                <h2>Resumen General</h2>
                <div class="action-buttons">
                    <a href="{{ route('movimientos.deposito') }}" class="btn btn-success">
                        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Depositar
                    </a>
                    <a href="{{ route('movimientos.retiro') }}" class="btn btn-primary">
                        <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                            <path d="M20 12H4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Retirar
                    </a>
                </div>
            </div>

            <div class="kpi-grid" id="kpiGrid">
                <!-- Los KPIs se cargarán dinámicamente -->
                <div class="kpi-card">
                    <div class="skeleton"></div>
                </div>
                <div class="kpi-card">
                    <div class="skeleton"></div>
                </div>
                <div class="kpi-card">
                    <div class="skeleton"></div>
                </div>
                <div class="kpi-card">
                    <div class="skeleton"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard-admin.js') }}"></script>
@endpush