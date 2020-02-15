@extends('layouts.app')

@section('title')
    Conductor
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mostrar las facturas del conductor</div>

                    <div class="card-body">
                        @if ($vehiculo != null)
                            <h5>Tu vehículo: {{$vehiculo->placa}} <br><small>Color: {{$vehiculo->color}}</small><br> <small>Modelo: {{$vehiculo->modelo}}</small></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
