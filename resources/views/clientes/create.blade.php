@extends('layouts.app')

@section('title', 'Registrar Cliente')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient text-white d-flex justify-content-between align-items-center" 
             style="background: linear-gradient(90deg, #8b5cf6, #6366f1);">
            <h5 class="mb-0">Registrar nuevo cliente</h5>
            <a href="{{ route('clientes') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="card-body p-4">
            <form id="formCliente" method="POST" action="{{ route('clientes.store') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Juan Pérez" required>
                    </div>

                    <div class="col-md-6">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="12345678" required maxlength="8">
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="987654321" required maxlength="9">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="cliente@correo.com">
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Av. Principal 123, Lima">
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4" style="background: #8b5cf6; border:none;">
                        <i class="fas fa-save"></i> Guardar Cliente
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('js/cliente-create.js') }}"></script>
@endpush
@endsection
