    // resources/js/app.js

    import axios from 'axios';
    window.axios = axios;

    // Configurar CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (csrfToken) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
        window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    }

    // ========================================
    // FUNCIONES GLOBALES
    // ========================================

    /**
     * Mostrar notificación toast
     */
    function showToast(message, type = 'success') {
        const toastContainer = document.getElementById('toast-container') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `toast toast-${type} transform transition-all duration-300 translate-x-full`;
        
        const icons = {
            success: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>`,
            error: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>`,
            warning: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>`,
            info: `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>`
        };
        
        toast.innerHTML = `
            <div class="flex items-center gap-3">
                ${icons[type] || icons.info}
                <span>${message}</span>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        // Animar entrada
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 10);
        
        // Auto-eliminar después de 3 segundos
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    /**
     * Crear contenedor de toasts
     */
    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'fixed top-4 right-4 z-50 space-y-2';
        document.body.appendChild(container);
        return container;
    }

    /**
     * Confirmar acción
     */
    function confirmAction(message, onConfirm) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: '¿Estás seguro?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3b82f6',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Sí, continuar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    onConfirm();
                }
            });
        } else {
            if (confirm(message)) {
                onConfirm();
            }
        }
    }

    /**
     * Formatear como moneda
     */
    function formatCurrency(amount) {
        return new Intl.NumberFormat('es-PE', {
            style: 'currency',
            currency: 'PEN'
        }).format(amount);
    }

    /**
     * Formatear fecha
     */
    function formatDate(date, format = 'short') {
        const d = new Date(date);
        const options = format === 'short' 
            ? { year: 'numeric', month: 'short', day: 'numeric' }
            : { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        
        return new Intl.DateTimeFormat('es-PE', options).format(d);
    }

    /**
     * Debounce
     */
    function debounce(func, wait = 300) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Copiar al portapapeles
     */
    async function copyToClipboard(text) {
        try {
            await navigator.clipboard.writeText(text);
            showToast('Copiado al portapapeles', 'success');
        } catch (err) {
            showToast('Error al copiar', 'error');
        }
    }

    /**
     * Validar formulario
     */
    function validateForm(form) {
        let isValid = true;
        const fields = form.querySelectorAll('[required]');
        
        fields.forEach(field => {
            if (!field.value.trim()) {
                showFieldError(field, 'Este campo es requerido');
                isValid = false;
            } else {
                clearFieldError(field);
            }
        });
        
        return isValid;
    }

    /**
     * Mostrar error en campo
     */
    function showFieldError(field, message) {
        clearFieldError(field);
        field.classList.add('border-red-500');
        
        const error = document.createElement('span');
        error.className = 'text-red-500 text-sm mt-1 field-error';
        error.textContent = message;
        field.parentNode.appendChild(error);
    }

    /**
     * Limpiar error de campo
     */
    function clearFieldError(field) {
        field.classList.remove('border-red-500');
        const error = field.parentNode.querySelector('.field-error');
        if (error) error.remove();
    }

    /**
     * Búsqueda en tiempo real
     */
    function setupLiveSearch(inputId, resultsId, searchUrl) {
        const input = document.getElementById(inputId);
        const results = document.getElementById(resultsId);
        
        if (!input || !results) return;
        
        const debouncedSearch = debounce(async (query) => {
            if (query.length < 2) {
                results.innerHTML = '';
                results.classList.add('hidden');
                return;
            }
            
            try {
                const response = await axios.get(searchUrl, {
                    params: { q: query }
                });
                displaySearchResults(results, response.data);
            } catch (error) {
                console.error('Error en búsqueda:', error);
            }
        }, 300);
        
        input.addEventListener('input', (e) => debouncedSearch(e.target.value));
    }

    /**
     * Mostrar resultados de búsqueda
     */
    function displaySearchResults(container, results) {
        if (results.length === 0) {
            container.innerHTML = '<div class="p-4 text-gray-500">No se encontraron resultados</div>';
        } else {
            container.innerHTML = results.map(item => `
                <a href="${item.url}" class="block p-3 hover:bg-gray-100 transition">
                    <div class="font-medium">${item.name}</div>
                    ${item.description ? `<div class="text-sm text-gray-600">${item.description}</div>` : ''}
                </a>
            `).join('');
        }
        container.classList.remove('hidden');
    }

    /**
     * Ordenar tabla
     */
    function sortTable(table, column, direction = 'asc') {
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        
        const sortedRows = rows.sort((a, b) => {
            const aVal = a.children[column].textContent.trim();
            const bVal = b.children[column].textContent.trim();
            
            if (direction === 'asc') {
                return aVal.localeCompare(bVal, 'es', { numeric: true });
            } else {
                return bVal.localeCompare(aVal, 'es', { numeric: true });
            }
        });
        
        tbody.innerHTML = '';
        sortedRows.forEach(row => tbody.appendChild(row));
    }

    /**
     * Filtrar tabla
     */
    function filterTable(table, searchTerm) {
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm.toLowerCase()) ? '' : 'none';
        });
    }

    // ========================================
    // INICIALIZACIÓN
    // ========================================

    document.addEventListener('DOMContentLoaded', function() {
        initTooltips();
        initModals();
        initDropdowns();
        autoHideAlerts();
        initSmoothScroll();
        initLazyLoading();
        
        console.log('✅ Cosmiko App initialized');
    });

    function initTooltips() {
        const tooltips = document.querySelectorAll('[data-tooltip]');
        tooltips.forEach(el => {
            el.classList.add('relative');
            
            el.addEventListener('mouseenter', function() {
                const text = this.getAttribute('data-tooltip');
                const tooltip = document.createElement('div');
                tooltip.className = 'absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-1 bg-gray-900 text-white text-xs rounded whitespace-nowrap z-50 tooltip-element';
                tooltip.textContent = text;
                this.appendChild(tooltip);
            });
            
            el.addEventListener('mouseleave', function() {
                const tooltip = this.querySelector('.tooltip-element');
                if (tooltip) tooltip.remove();
            });
        });
    }

    function initModals() {
        document.querySelectorAll('[data-modal-open]').forEach(btn => {
            btn.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-open');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            });
        });
        
        document.querySelectorAll('[data-modal-close]').forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        });
        
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }
            });
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal:not(.hidden)').forEach(modal => {
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                });
            }
        });
    }

    function initDropdowns() {
        document.querySelectorAll('[data-dropdown-toggle]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdownId = this.getAttribute('data-dropdown-toggle');
                const dropdown = document.getElementById(dropdownId);
                
                if (dropdown) {
                    document.querySelectorAll('.dropdown-menu').forEach(d => {
                        if (d !== dropdown) d.classList.add('hidden');
                    });
                    dropdown.classList.toggle('hidden');
                }
            });
        });
        
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        });
    }

    function autoHideAlerts() {
        document.querySelectorAll('.alert[data-auto-hide]').forEach(alert => {
            const delay = parseInt(alert.getAttribute('data-auto-hide')) || 3000;
            setTimeout(() => {
                alert.style.transition = 'opacity 0.3s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }, delay);
        });
    }

    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href !== '#!') {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    }

    function initLazyLoading() {
        const images = document.querySelectorAll('img[data-src]');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.getAttribute('data-src');
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                });
            });
            
            images.forEach(img => imageObserver.observe(img));
        } else {
            images.forEach(img => {
                img.src = img.getAttribute('data-src');
                img.removeAttribute('data-src');
            });
        }
    }

    // Exportar funciones globales
    window.Cosmiko = {
        showToast,
        confirmAction,
        formatCurrency,
        formatDate,
        debounce,
        copyToClipboard,
        validateForm,
        setupLiveSearch,
        sortTable,
        filterTable
    };