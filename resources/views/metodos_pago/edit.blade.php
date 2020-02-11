@extends('layouts.app')

@section('title') Editar método de pago
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Editar método de pago</h1></div>
            <div class="card-body">
                @include('metodos_pago.form', ['metodo_pago' => $metodo_pago, 'route' => ['metodos_pago.update', $metodo_pago->id], 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection
