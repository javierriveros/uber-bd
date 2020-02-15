@extends('layouts.app')

@section('title')
    Página principal
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{Auth::user()->name}}</div>
                <div class="card-body text-center">
                    <a href="{{route('facturas.create', ['pasajero' => 1])}}" class="btn btn-block btn-primary">Solicita tu viaje</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
