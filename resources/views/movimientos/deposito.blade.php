@extends('layouts.app')

@section('title', 'Depósitos')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold mb-0">Registrar Depósito</h4>
                    <i class="bi bi-arrow-down-circle fs-3 text-success"></i>
                </div>
                <hr>

                <!-- Formulario de Depósito -->
                <form id="depositoForm" method="POST" action="{{ route('movimientos.deposito.store') }}">
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
                        <label for="monto" class="form-label fw-medium">Monto (S/)</label>
                        <input type="number" id="monto" name="monto" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-medium">Fecha del depósito</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="metodo" class="form-label fw-medium">Método de pago</label>
                        <select id="metodo" name="metodo" class="form-select" required>
                            <option value="">Selecciona un método</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Tarjeta">Tarjeta</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="referencia" class="form-label fw-medium">Referencia / Código de operación</label>
                        <input type="text" id="referencia" name="referencia" class="form-control" placeholder="Opcional">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4 rounded-pill">
                            <i class="bi bi-check-circle me-2"></i>Confirmar Depósito
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabla de Depósitos recientes -->
            <div class="card mt-4 shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0">Depósitos Recientes</h5>
                    <i class="bi bi-clock-history fs-4 text-primary"></i>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Cliente</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Método</th>
                                <th>Referencia</th>
                            </tr>
                        </thead>
                        <tbody id="depositosTabla">
                            <tr>
                                <td>Juan Pérez</td>
                                <td>S/ 350.00</td>
                                <td>2025-10-25</td>
                                <td>Transferencia</td>
                                <td>OP-89324</td>
                            </tr>
                            <tr>
                                <td>María López</td>
                                <td>S/ 220.00</td>
                                <td>2025-10-24</td>
                                <td>Efectivo</td>
                                <td>---</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
