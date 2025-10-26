@extends('layout')

@section('content')
    <h2>Pago de Servicios</h2>
    <form>
        <div class="mb-3">
            <label for="servicio" class="form-label">Servicio</label>
            <select class="form-control" id="servicio">
                <option>Luz</option>
                <option>Agua</option>
                <option>Internet</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" class="form-control" id="monto">
        </div>
        <button type="submit" class="btn btn-warning">Pagar</button>
    </form>
@endsection
@extends('layouts.app')
