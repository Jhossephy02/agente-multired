<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Trabajador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>💼 Bienvenido, Trabajador</h2>
    <p>Selecciona una de las siguientes operaciones:</p>

    <ul>
        <li><a href="#">Retiro</a></li>
        <li><a href="#">Depósito</a></li>
        <li><a href="#">Pago de Servicios</a></li>
    </ul>

    <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Cerrar sesión</a>
</body>
</html>
