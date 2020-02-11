@extends('layouts.app')

@section('title') Editar tarifa
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Editar tarifa</h2></div>
            <div class="card-body">
                @include('tarifas.form', ['tarifa' => $tarifa, 'route' => ['tarifas.update', $tarifa->id], 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection
