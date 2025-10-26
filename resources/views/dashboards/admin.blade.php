<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>👑 Bienvenido, Administrador</h2>
    <p>Aquí puedes agregar trabajadores, gestionar clientes y revisar transacciones.</p>

    <ul>
        <li><a href="#">Agregar Trabajador</a></li>
        <li><a href="#">Ver Clientes Concurrentes</a></li>
        <li><a href="#">Control de Retiro, Depósito y Pago</a></li>
    </ul>

    <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Cerrar sesión</a>
</body>
</html>
