@extends('layouts.app')

@section('title') Editar vehículo
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Editar vehículo</h2></div>
            <div class="card-body">
                @include('vehiculos.form', ['vehiculo' => $vehiculo, 'route' => ['vehiculos.update', $vehiculo->id], 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection
