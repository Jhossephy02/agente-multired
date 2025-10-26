@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <h1>Hola desde Clientes</h1>

                <th>ID</th>
                <th>DNI</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id_cliente }}</td>
                <td>{{ $cliente->dni }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
