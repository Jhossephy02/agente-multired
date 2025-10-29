COSMIKO - ASTROPAY UI PACK
=================================

Este paquete reemplaza/añade UI moderna con modo oscuro/claro + saldo global + movimientos.

1) Copia estos archivos dentro de tu proyecto (respetando rutas).
   - routes/web.php  (reemplazar)
   - app/Http/Controllers/DashboardController.php (reemplazar)
   - app/Http/Controllers/MovimientoController.php (reemplazar)
   - app/Models/Movimiento.php (reemplazar)
   - resources/views/layouts/app.blade.php (reemplazar)
   - resources/views/partials/sidebar.blade.php (reemplazar)
   - resources/views/dashboards/*.blade.php (reemplazar)
   - resources/views/movimientos/*.blade.php (reemplazar)
   - resources/css/app.css (reemplazar)
   - resources/css/themes/astropay.css (nuevo/reemplazar)
   - resources/js/layouts/theme.js (nuevo/reemplazar)
   - postcss.config.js (reemplazar)
   - tailwind.config.js (reemplazar)

2) Instalar dependencias frontend:
   npm uninstall tailwindcss postcss autoprefixer --legacy-peer-deps
   npm install -D tailwindcss@latest postcss@latest autoprefixer@latest bootstrap-icons

3) Compilar assets:
   npm run dev   (o npm run build)

4) Limpiar caches de Laravel (opcional):
   php artisan route:clear
   php artisan config:clear
   php artisan view:clear
   php artisan optimize:clear

5) Servir:
   php artisan serve

Notas:
- Modo oscuro/claro con el botón 'Cambiar tema' en el sidebar.
- El saldo global se calcula desde el modelo Movimiento::saldoActual().
