@extends('layouts.app')

@section('title') Crear ubicación
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Nueva ubicación</h1></div>
            <div class="card-body">
                @include('ubicaciones.form', ['ubicacion' => $ubicacion, 'route' => 'ubicaciones.store', 'method' => 'POST'])
            </div>
        </div>
    </div>
@endsection
