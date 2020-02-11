@extends('layouts.app')

@section('title') Crear tarifa
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Nueva tarifa</h1></div>
            <div class="card-body">
                @include('tarifas.form', ['tarifa' => $tarifa, 'route' => 'tarifas.store', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection
