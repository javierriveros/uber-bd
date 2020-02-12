@extends('layouts.app')

@section('title') Agrega un vehículo
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Agrega un vehículo</h1></div>
            <div class="card-body">
                @include('vehiculos.form', ['vehiculo' => $vehiculo, 'route' => 'vehiculos.store', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection
