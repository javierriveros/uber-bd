@extends('layouts.app')

@section('title') Crear factura
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Nueva factura</h1></div>
            <div class="card-body">
                @include('facturas.form', ['factura' => $factura, 'route' => 'facturas.store', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection
