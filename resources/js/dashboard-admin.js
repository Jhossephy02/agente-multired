// public/js/dashboard-admin.js

// ========================================
// CONFIGURACIÓN
// ========================================
const API_BASE = window.Laravel?.apiUrl || '/api';
const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content;

// ========================================
// FORMATEO
// ========================================
function formatCurrency(amount) {
    return new Intl.NumberFormat('es-PE', {
        style: 'currency',
        currency: 'PEN'
    }).format(amount);
}

function formatDate() {
    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    return new Date().toLocaleDateString('es-PE', options);
}

// ========================================
// ACTUALIZAR FECHA
// ========================================
function updateDateHeader() {
    const dateEl = document.getElementById('currentDate');
    if (dateEl) {
        dateEl.textContent = formatDate();
    }
}

// ========================================
// CARGAR KPIs
// ========================================
async function loadKPIs() {
    try {
        const response = await fetch(`${API_BASE}/dashboard/kpis`, {
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            renderKPIs(data.kpis);
        } else {
            showError('No se pudieron cargar los KPIs');
        }
    } catch (error) {
        console.error('Error cargando KPIs:', error);
        showError('Error de conexión al cargar datos');
    }
}

// ========================================
// RENDERIZAR KPIs
// ========================================
function renderKPIs(kpis) {
    const kpiGrid = document.getElementById('kpiGrid');
    if (!kpiGrid) return;
    
    const changeIcon = (cambio) => {
        if (cambio >= 0) {
            return `<svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>`;
        } else {
            return `<svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>`;
        }
    };
    
    kpiGrid.innerHTML = `
        <!-- Saldo Total -->
        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon blue">
                    <svg viewBox="0 0 24 24">
                        <path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" 
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.saldo_total.cambio >= 0 ? 'positive' : 'negative'}">
                    ${changeIcon(kpis.saldo_total.cambio)}
                    ${kpis.saldo_total.cambio > 0 ? '+' : ''}${kpis.saldo_total.cambio}%
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Saldo Total</h3>
                <div class="kpi-value">${formatCurrency(kpis.saldo_total.valor)}</div>
            </div>
        </div>

        <!-- Depósitos del Mes -->
        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon green">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.depositos_mes.cambio >= 0 ? 'positive' : 'negative'}">
                    ${changeIcon(kpis.depositos_mes.cambio)}
                    ${kpis.depositos_mes.cambio > 0 ? '+' : ''}${kpis.depositos_mes.cambio}%
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Depósitos del Mes</h3>
                <div class="kpi-value">${formatCurrency(kpis.depositos_mes.valor)}</div>
            </div>
        </div>

        <!-- Clientes Activos -->
        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon purple">
                    <svg viewBox="0 0 24 24">
                        <path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" 
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.clientes_activos.cambio >= 0 ? 'positive' : 'negative'}">
                    ${changeIcon(kpis.clientes_activos.cambio)}
                    ${kpis.clientes_activos.cambio > 0 ? '+' : ''}${kpis.clientes_activos.cambio}%  
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Clientes Activos</h3>
                <div class="kpi-value">${kpis.clientes_activos.valor}</div>
            </div>
        </div>
    `;
}