@extends('layouts.app')
@section('title') Administrar facturas
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-hover table-responsive-sm">
                    <caption>Lista de facturas</caption>
                    <a href="{{ route('facturas.create') }}" class="btn btn-sm btn-success my-4 d-print-none" title="Añadir factura">
                        Añadir factura
                    </a>


                    <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Pasajero</th>
                        <th>Conductor</th>
                        <th>Vehiculo</th>
                        <th>Método de pago</th>
                        <th>Total</th>
                        <th class="d-print-none">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <th scope="row">{{ $factura->id }}</th>
                            <td>{{ $factura->pasajero->name }} {{ $factura->pasajero->apellido }} <br><span
                                    class="badge badge-dark font-weight-normal">Cel: {{ $factura->pasajero->celular }}</span>
                            </td>
                            <td>{{ $factura->vehiculo->conductor->name }} {{ $factura->vehiculo->conductor->apellido }}
                                <br/><span
                                    class="badge badge-dark font-weight-normal">Cel: {{ $factura->vehiculo->conductor->celular }}</span>
                            </td>
                            <td>{{ $factura->vehiculo->placa }}</td>
                            <td>{{ $factura->metodo_pago->nombre_met }}</td>
                            <td>{{ $factura->total }}</td>
                            <td class="d-print-none">
                                <a href="{{route('facturas.show', $factura)}}" class="btn btn-sm btn-info"><i
                                        class="fa fa-eye"></i> <span class="d-none d-lg-inline-block">Ver</span></a>
{{--                                <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-sm btn-primary"--}}
{{--                                   title="Editar"><i class="fa fa-pencil-alt"></i> <span--}}
{{--                                        class="d-none d-lg-inline-block">Editar</span></a>--}}
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
