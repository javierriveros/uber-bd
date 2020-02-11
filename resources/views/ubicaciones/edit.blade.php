@extends('layouts.app')

@section('title') Editar ubicación
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header"><h2 class="m-0">Editar ubicación</h2></div>
            <div class="card-body">
                @include('ubicaciones.form', ['ubicacion' => $ubicacion, 'route' => ['ubicaciones.update', $ubicacion->id], 'method' => 'PATCH'])
            </div>
        </div>
    </div>
@endsection
