// public/js/dashboard.js

// ========================================
// CONFIGURACIÓN GLOBAL
// ========================================
const API_URL = '/api';
const CURRENCY = 'PEN';

// ========================================
// NAVEGACIÓN ENTRE PÁGINAS
// ========================================
function changePage(pageName) {
    // Ocultar todas las páginas
    document.querySelectorAll('.page-content').forEach(page => {
        page.style.display = 'none';
    });
    
    // Mostrar la página seleccionada
    const targetPage = document.getElementById(`page-${pageName}`);
    if (targetPage) {
        targetPage.style.display = 'block';
    }
    
    // Actualizar menú activo
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('data-page') === pageName) {
            item.classList.add('active');
        }
    });
}

// ========================================
// TOGGLE SIDEBAR
// ========================================
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('expanded');
}

// ========================================
// FORMATEO DE NÚMEROS Y FECHAS
// ========================================
function formatCurrency(amount) {
    return new Intl.NumberFormat('es-PE', {
        style: 'currency',
        currency: CURRENCY
    }).format(amount);
}

function formatDate(date) {
    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    return new Date(date).toLocaleDateString('es-PE', options);
}

// ========================================
// ACTUALIZAR FECHA EN HEADERS
// ========================================
function updateDateHeaders() {
    const currentDate = formatDate(new Date());
    document.querySelectorAll('.header-date').forEach(el => {
        el.textContent = currentDate;
    });
}

// ========================================
// CARGAR KPIs DEL DASHBOARD
// ========================================
async function loadDashboardKPIs() {
    try {
        const response = await fetch(`${API_URL}/dashboard/kpis`);
        const data = await response.json();
        
        if (data.success) {
            renderKPIs(data.kpis);
        }
    } catch (error) {
        console.error('Error cargando KPIs:', error);
        showToast('Error al cargar los datos', 'error');
    }
}

function renderKPIs(kpis) {
    const kpiGrid = document.getElementById('kpiGrid');
    
    const kpiHTML = `
        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon blue">
                    <svg viewBox="0 0 24 24">
                        <path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.saldo_total.cambio >= 0 ? 'positive' : 'negative'}">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    ${kpis.saldo_total.cambio > 0 ? '+' : ''}${kpis.saldo_total.cambio}%
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Saldo Total</h3>
                <div class="kpi-value">${formatCurrency(kpis.saldo_total.valor)}</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon green">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.depositos_mes.cambio >= 0 ? 'positive' : 'negative'}">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    ${kpis.depositos_mes.cambio > 0 ? '+' : ''}${kpis.depositos_mes.cambio}%
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Depósitos del Mes</h3>
                <div class="kpi-value">${formatCurrency(kpis.depositos_mes.valor)}</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon purple">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.clientes_activos.cambio >= 0 ? 'positive' : 'negative'}">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    ${kpis.clientes_activos.cambio > 0 ? '+' : ''}${kpis.clientes_activos.cambio}
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Clientes Activos</h3>
                <div class="kpi-value">${kpis.clientes_activos.valor}</div>
            </div>
        </div>

        <div class="kpi-card">
            <div class="kpi-card-header">
                <div class="kpi-icon orange">
                    <svg viewBox="0 0 24 24">
                        <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="kpi-change ${kpis.transacciones.cambio >= 0 ? 'positive' : 'negative'}">
                    <svg viewBox="0 0 24 24" stroke="currentColor" fill="none">
                        <path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    ${kpis.transacciones.cambio > 0 ? '+' : ''}${kpis.transacciones.cambio}%
                </div>
            </div>
            <div class="kpi-card-body">
                <h3>Transacciones</h3>
                <div class="kpi-value">${kpis.transacciones.valor}</div>
            </div>
        </div>
    `;
    
    kpiGrid.innerHTML = kpiHTML;
}

// ========================================
// CARGAR CLIENTES EN SELECTS
// ========================================
async function loadClientes() {
    try {
        const response = await fetch(`${API_URL}/clientes`);
        const data = await response.json();
        
        if (data.success) {
            populateClienteSelect('clienteRetiro', data.clientes, true);
            populateClienteSelect('clienteDeposito', data.clientes, false);
        }
    } catch (error) {
        console.error('Error cargando clientes:', error);
    }
}

function populateClienteSelect(selectId, clientes, showSaldo) {
    const select = document.getElementById(selectId);
    if (!select) return;
    
    select.innerHTML = '<option value="">Seleccionar cliente...</option>';
    
    clientes.forEach(cliente => {
        const option = document.createElement('option');
        option.value = cliente.id;
        option.textContent = showSaldo 
            ? `${cliente.nombre} - ${formatCurrency(cliente.saldo)}`
            : cliente.nombre;
        select.appendChild(option);
    });
}

// ========================================
// MANEJAR FORMULARIO DE RETIRO
// ========================================
document.getElementById('formRetiro')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    try {
        const response = await fetch(`${API_URL}/retiros`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            showToast('Retiro registrado exitosamente', 'success');
            this.reset();
            changePage('dashboard');
            loadDashboardKPIs();
        } else {
            showToast(result.message || 'Error al registrar retiro', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Error de conexión', 'error');
    }
});

// ========================================
// MANEJAR FORMULARIO DE DEPÓSITO
// ========================================
document.getElementById('formDeposito')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    try {
        const response = await fetch(`${API_URL}/depositos`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            showToast('Depósito registrado exitosamente', 'success');
            this.reset();
            changePage('dashboard');
            loadDashboardKPIs();
        } else {
            showToast(result.message || 'Error al registrar depósito', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Error de conexión', 'error');
    }
});

// ========================================
// SISTEMA DE NOTIFICACIONES TOAST
// ========================================
function showToast(message, type = 'success') {
    const toastContainer = document.getElementById('toast-container') || createToastContainer();
    
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    
    const icons = {
        success: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>`,
        error: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>`,
        warning: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>`,
        info: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>`
    };
    
    toast.innerHTML = `
        <div class="toast-content">
            ${icons[type] || icons.info}
            <span>${message}</span>
        </div>
    `;
    
    toastContainer.appendChild(toast);
    
    // Animar entrada
    setTimeout(() => toast.classList.add('show'), 10);
    
    // Auto-ocultar después de 3 segundos
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

function createToastContainer() {
    const container = document.createElement('div');
    container.id = 'toast-container';
    container.className = 'toast-container';
    document.body.appendChild(container);
    return container;
}

// ========================================
// INICIALIZACIÓN AL CARGAR LA PÁGINA
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Cosmiko Dashboard inicializado');
    
    // Actualizar fechas
    updateDateHeaders();
    
    // Cargar datos iniciales
    loadDashboardKPIs();
    loadClientes();
    
    // Actualizar fecha cada minuto
    setInterval(updateDateHeaders, 60000);
}); 