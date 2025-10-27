@extends('layouts.app')

@section('title', 'Listado de Clientes')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 px-4 border-bottom">
            <h4 class="mb-0 fw-semibold text-dark">Listado de Clientes</h4>
            <a href="{{ route('clientes.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-person-plus"></i> Nuevo Cliente
            </a>
        </div>

        <div class="card-body px-4">
            <!-- Buscador -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar cliente..." id="buscadorClientes">
                </div>
            </div>

            <!-- Tabla -->
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="tablaClientes">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ejemplo de datos estáticos (puedes reemplazar por un @foreach) -->
                        <tr>
                            <td>1</td>
                            <td>Juan Pérez</td>
                            <td>72839102</td>
                            <td>juanperez@gmail.com</td>
                            <td>987654321</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>María López</td>
                            <td>72634981</td>
                            <td>maria.lopez@example.com</td>
                            <td>987654322</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger btn-delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
