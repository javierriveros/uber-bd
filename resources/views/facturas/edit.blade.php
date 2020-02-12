@extends('layouts.app')

@section('title') Editar factura
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Editar factura</h2></div>
            <div class="card-body">
                @include('facturas.form', ['factura' => $factura, 'route' => ['facturas.update', $factura->id], 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection
