@extends('layouts.app')

@section('title', 'Trámites')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-semibold mb-0">Registrar Trámite</h4>
                    <i class="bi bi-file-earmark-text text-info fs-3"></i>
                </div>
                <hr>

                <!-- Formulario de Trámite -->
                <form id="tramiteForm" method="POST" action="{{ route('movimientos.tramites.store') }}">
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
                        <label for="tipo" class="form-label fw-medium">Tipo de Trámite</label>
                        <input type="text" id="tipo" name="tipo" class="form-control" placeholder="Ej: Solicitud de crédito" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-medium">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="3" placeholder="Detalles del trámite..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label fw-medium">Fecha de solicitud</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-info px-4 rounded-pill text-white">
                            <i class="bi bi-send-check me-2"></i>Registrar Trámite
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabla de trámites -->
            <div class="card mt-4 shadow-sm border-0 rounded-4 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-semibold mb-0">Trámites Registrados</h5>
                    <i class="bi bi-clock-history fs-4 text-info"></i>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tramitesTabla">
                            <tr>
                                <td>Juan Pérez</td>
                                <td>Solicitud de crédito</td>
                                <td>Trámite en revisión</td>
                                <td>2025-10-22</td>
                                <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                <td>
                                    <button class="btn btn-sm btn-success actualizarEstado">
                                        <i class="bi bi-check-circle"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>María López</td>
                                <td>Renovación de contrato</td>
                                <td>Listo para aprobación</td>
                                <td>2025-10-24</td>
                                <td><span class="badge bg-success">Completado</span></td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
