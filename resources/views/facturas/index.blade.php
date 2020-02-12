@extends('layouts.app')
@section('title') Administrar facturas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de facturas</caption>

                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Pasajero</th>
                        <th>Conductor</th>
                        <th>Vehiculo</th>
                        <th>Método de pago</th>
                        <th>Tarifa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <th scope="row">{{ $factura->id }}</th>
                            <td>{{ $factura->user->name }} {{ $factura->user->apellido }} <br><span class="badge badge-dark font-weight-normal">Cel: {{ $factura->user->celular }}</span></td>
                            <td>{{ $factura->vehiculo->conductor->name }} {{ $factura->vehiculo->conductor->apellido }} <br /><span class="badge badge-dark font-weight-normal">Cel: {{ $factura->vehiculo->conductor->celular }}</span></td>
                            <td>{{ $factura->vehiculo->placa }}</td>
                            <td>{{ $factura->metodo_pago->nombre_met }}</td>
                            <td>{{ $factura->tarifa->valor }}</td>
                            <td>
                                <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-sm btn-primary"
                                    title="Editar"><i class="fa fa-pencil-alt"></i> <span class="d-none d-lg-inline-block">Editar</span></a>
                                @include('facturas.delete', ['id' => $factura->id])
                            </td>
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
