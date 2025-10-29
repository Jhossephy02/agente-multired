@extends('layouts.app')
@section('title','Dashboard Admin — Cosmiko')
@section('content')
<section class="grid">
    <article class="card kpi">
        <h3>Depósitos del día</h3>
        <p class="big">S/ 2,450.30</p>
    </article>
    <article class="card kpi">
        <h3>Retiros del día</h3>
        <p class="big">S/ 1,120.00</p>
    </article>
    <article class="card kpi">
        <h3>Clientes nuevos</h3>
        <p class="big">8</p>
    </article>
    <article class="card kpi">
        <h3>Operaciones</h3>
        <p class="big">53</p>
    </article>

    <article class="card span-2">
        <h3>Últimas operaciones</h3>
        <div class="table">
            <div class="t-head">
                <span>Fecha</span><span>Cliente</span><span>Tipo</span><span>Monto</span>
            </div>
            <div class="t-row"><span>Hoy 09:15</span><span>María G.</span><span class="pill success">Depósito</span><span>S/ 350.00</span></div>
            <div class="t-row"><span>Hoy 08:42</span><span>Juan P.</span><span class="pill danger">Retiro</span><span>S/ 120.00</span></div>
            <div class="t-row"><span>Ayer</span><span>Ana L.</span><span class="pill warn">Pago servicio</span><span>S/ 78.50</span></div>
        </div>
    </article>
</section>
@endsection
