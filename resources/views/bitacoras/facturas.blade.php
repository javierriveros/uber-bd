@extends('layouts.app')
@section('title') Administrar facturas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-hover table-responsive-sm">
                    <caption>Bitácora de facturas</caption>

                    <thead class="thead-light">
                    <tr>
                        <th>Operación</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Pasajero</th>
                        <th>Placa del vehículo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Método de pago</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bitacoras as $factura)
                        <tr>
                            <th scope="row">{{ $factura->operacion }}</th>
                            <td>{{$factura->usuario}}</td>
                            <td>{{ date('Y m d H:i:s',strtotime($factura->fecha)) }}</td>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->total }}</td>
                            <td>{{ $factura->pasajero_name }} {{ $factura->pasajero_apellido }} <br><span
                                    class="badge badge-dark font-weight-normal">Cel: {{ $factura->pasajero_celular }}</span>
                            </td>
                            <td>{{ $factura->vehiculo_placa }}</td>
                            <td>Barrio: {{ $factura->origen_barr }}<br> Dirección: {{ $factura->origen_dir }}</td>
                            <td>Barrio: {{ $factura->destino_barr }}<br> Dirección: {{ $factura->destino_dir }}</td>
                            <td>{{ $factura->metodo_pago_nombre_met }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <!-- <div class="d-flex justify-content-center">
                {{-- {!! $facturas->links() !!} --}}
                </div> -->
            </div>
        </div>
    </div>
@endsection
