
Cosmiko UI Palettes Pack (4 estilos)
====================================

Incluye:
- 4 paletas: astropay, neon, banco, narco
- Sidebar elegante + persistencia dark/light y paleta en localStorage
- Layout base listo para @vite

Cómo integrar:
1) Copia las carpetas en tu proyecto:
   resources/css/themes/*
   resources/js/layouts/theme.js
   resources/views/partials/sidebar.blade.php
   resources/views/layouts/app.blade.php
2) Asegúrate de tener en tu layout:
   @vite(['resources/css/app.css','resources/js/layouts/theme.js'])
3) Corre Vite:
   npm run dev

Uso:
- Botón 🌙/☀️ para dark/light
- Selector "Paleta" para cambiar entre: astropay, neon, banco, narco (se guarda en localStorage)
