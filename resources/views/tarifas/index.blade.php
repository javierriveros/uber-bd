@extends('layouts.app')
@section('title') Administrar tarifas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de tarifas</caption>
                <a href="{{ route('tarifas.create') }}" class="btn btn-sm btn-success my-4" title="Añadir tarifa">
                    Añadir tarifa
                </a>

                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Dirección Origen</th>
                        <th>Dirección Destino</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tarifas as $tarifa)
                        <tr>
                            <th scope="row">{{ $tarifa->id }}</th>
                            <td>Barrio: {{ $tarifa->origen->nombre_barr }}<br> Dirección: {{ $tarifa->origen->direccion }}</td>
                            <td>Barrio: {{ $tarifa->destino->nombre_barr }}<br> Dirección: {{ $tarifa->destino->direccion }}</td>
                            <td>{{ $tarifa->valor }}</td>
                            <td>
                                <a href="{{ route('tarifas.edit', $tarifa->id) }}" class="btn btn-sm btn-primary"
                                    title="Editar"><i class="fa fa-pencil-alt"></i> <span class="d-none d-lg-inline-block">Editar</span></a>
                                @include('tarifas.delete', ['id' => $tarifa->id])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- <div class="d-flex justify-content-center">
                {{-- {!! $tarifas->links() !!} --}}
            </div> -->
        </div>
    </div>
</div>
@endsection
