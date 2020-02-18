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
                        <th>ID Pasajero</th>
                        <th>ID Vehiculo</th>
                        <th>ID Método de pago</th>
                        <th>ID Tarifa</th>
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
                            <td>{{ $factura->pasajero_id }}</td>
                            <td>{{ $factura->vehiculo_id }}</td>
                            <td>{{ $factura->metodo_pago_id }}</td>
                            <td>{{ $factura->tarifa_id }}</td>
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
