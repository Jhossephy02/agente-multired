@extends('layouts.app')

@section('title', 'Pago de Servicios')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold mb-0">Registrar Pago de Servicio</h4>
                    <i class="bi bi-cash-stack fs-3 text-primary"></i>
                </div>
                <hr>

                <!-- Formulario de Pago -->
                <form id="pagoForm" method="POST" action="{{ route('movimientos.pago_servicio.store') }}">
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
                        <label for="servicio" class="form-label fw-medium">Tipo de Servicio</label>
                        <select id="servicio" name="servicio" class="form-select" required>
                            <option value="">Selecciona un servicio</option>
                            <option value="Agua">Agua</option>
                            <option value="Luz">Luz</option>
                            <option value="Internet">Internet</option>
                            <option value="Teléfono">Teléfono</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="monto" class="form-label fw-medium">Monto (S/)</label>
                        <input type="number" id="monto" name="monto" class="form-control" step="0.01" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-medium">Fecha del pago</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="metodo" class="form-label fw-medium">Método de pago</label>
                        <select id="metodo" name="metodo" class="form-select" required>
                            <option value="">Selecciona un método</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Transferencia">Transferencia</option>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">
                            <i class="bi bi-check-circle me-2"></i>Confirmar Pago
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabla de pagos recientes -->
            <div class="card mt-4 shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0">Pagos Recientes</h5>
                    <i class="bi bi-clock-history fs-4 text-info"></i>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Cliente</th>
                                <th>Servicio</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Método</th>
                            </tr>
                        </thead>
                        <tbody id="pagosTabla">
                            <tr>
                                <td>María López</td>
                                <td>Internet</td>
                                <td>S/ 120.00</td>
                                <td>2025-10-25</td>
                                <td>Tarjeta</td>
                            </tr>
                            <tr>
                                <td>Juan Pérez</td>
                                <td>Luz</td>
                                <td>S/ 90.00</td>
                                <td>2025-10-23</td>
                                <td>Efectivo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
