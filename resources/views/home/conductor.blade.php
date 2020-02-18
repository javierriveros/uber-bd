@extends('layouts.app')

@section('title')
    Conductor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">Tu vehículo</div>

                    <div class="card-body">
                        @if ($vehiculo != null)
                            <h5>Tu vehículo: {{$vehiculo->placa}} <br><small>Color: {{$vehiculo->color}}</small><br> <small>Modelo: {{$vehiculo->modelo}}</small></h5>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <table class="table table-hover table-responsive-sm mt-2">
                    <caption>Tus facturas</caption>
                    <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Pasajero</th>
                        <th>Dirección Origen</th>
                        <th>Dirección Destino</th>
                        <th>Método de pago</th>
                        <th>Total</th>
                        <th class="d-print-none">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <th scope="row">{{ $factura->id }}</th>
                            <td>{{ $factura->pasajero_name }} {{ $factura->pasajero_apellido }} <br><span
                                    class="badge badge-dark font-weight-normal">Cel: {{ $factura->pasajero_celular }}</span>
                            </td>
                            <td>Barrio: {{ $factura->origen_barr }}<br> Dirección: {{ $factura->origen_dir }}</td>
                            <td>Barrio: {{ $factura->destino_barr }}<br> Dirección: {{ $factura->destino_dir }}</td>
                            <td>{{ $factura->metodo_pago_nombre_met }}</td>
                            <td>{{ $factura->total }}</td>
                            <td class="d-print-none">
                                <a href="{{route('facturas.show', $factura->id)}}" class="btn btn-sm btn-info"><i
                                        class="fa fa-eye"></i> <span class="d-none d-lg-inline-block">Ver</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
