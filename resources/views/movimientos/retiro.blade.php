@extends('layouts.app')

@section('title', 'Retiros')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold mb-0">Registrar Retiro</h4>
                    <i class="bi bi-arrow-up-circle text-danger fs-3"></i>
                </div>
                <hr>

                <!-- Formulario de Retiro -->
                <form id="retiroForm" method="POST" action="{{ route('movimientos.retiro.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="cliente" class="form-label fw-medium">Cliente</label>
                        <select id="cliente" name="cliente" class="form-select" required>
                            <option value="">Selecciona un cliente</option>
                            <option value="1">Juan Pérez</option>
                            <option value="2">María López</option>
                            <option value="3">Carlos Díaz</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cuenta" class="form-label fw-medium">Cuenta</label>
                        <select id="cuenta" name="cuenta" class="form-select" required>
                            <option value="">Selecciona una cuenta</option>
                            <option value="Ahorros">Cuenta de Ahorros</option>
                            <option value="Corriente">Cuenta Corriente</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="monto" class="form-label fw-medium">Monto a retirar (S/)</label>
                        <input type="number" id="monto" name="monto" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-medium">Fecha del Retiro</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-danger px-4 rounded-pill">
                            <i class="bi bi-cash me-2"></i>Confirmar Retiro
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabla de retiros recientes -->
            <div class="card mt-4 shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0">Retiros Recientes</h5>
                    <i class="bi bi-clock-history fs-4 text-danger"></i>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Cliente</th>
                                <th>Cuenta</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody id="retirosTabla">
                            <tr>
                                <td>Juan Pérez</td>
                                <td>Ahorros</td>
                                <td>S/ 250.00</td>
                                <td>2025-10-20</td>
                            </tr>
                            <tr>
                                <td>María López</td>
                                <td>Corriente</td>
                                <td>S/ 400.00</td>
                                <td>2025-10-23</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
