<!-- resources/views/clientes/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Nuevo Cliente</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('clientes.index') }}">⬅ Volver</a>
</body>
</html>
