@extends('layouts.app')

@section('title') Información de la factura
@endsection

@section('content')
    <div class="container course">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-0">{{$factura->pasajero->name}} {{$factura->pasajero->apellido}}</h3>
                        <span class="badge badge-info">Celular: {{$factura->pasajero->celular}}</span>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex justify-content-between">
                        </div>

                        <h4 class="mb-0">Conductor: {{$factura->vehiculo->conductor->name}} {{$factura->vehiculo->conductor->apellido}} <small>Cel: {{$factura->vehiculo->conductor->celular}}</small></h4>
                        <h5>Vehículo: {{$factura->vehiculo->placa}} <small>{{$factura->vehiculo->color}}</small></h5>
                        <div class="border-bottom w-100 mb-4"></div>


                        <h5 class="mb-0">Origen: <span class="font-weight-normal">{{$factura->tarifa->origen->nombre_barr}} - {{$factura->tarifa->origen->direccion}}</span></h5>
                        <h5>Destino: <span class="font-weight-normal">{{$factura->tarifa->destino->nombre_barr}} - {{$factura->tarifa->destino->direccion}}</span></h5>
                        <div class="border-bottom w-100 mb-4"></div>

                        <h5 class="mb-0">Método de pago: <span class="font-weight-normal">{{$factura->metodo_pago->nombre_met}}</span> <small>Descuento: {{$factura->metodo_pago->descuento}}</small></h5>
                        <h5>Tarifa: <span class="font-weight-normal">${{$factura->tarifa->valor}}</span></h5>
                        <div class="border-bottom w-100 mb-4"></div>

                        <div class="text-center">
                            <h4 class="mb-0">Total: ${{$factura->total}}</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
