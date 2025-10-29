@extends('layouts.app')

@section('title', 'Panel Administrador')

@section('content')
<div class="dashboard-container">
    <h2>Panel Administrador</h2>

    @include('dashboards.partials.metrics') {{-- si luego agregas métricas --}}
</div>
@endsection
