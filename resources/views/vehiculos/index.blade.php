@extends('layouts.app')
@section('title') Administrar vehiculos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de vehiculos</caption>
{{--                <a href="{{ route('vehiculos.create') }}" class="btn btn-sm btn-success my-4" title="Añadir vehículo">--}}
{{--                    Añadir vehículo--}}
{{--                </a>--}}

                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Conductor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                        <tr>


                            <th scope="row">{{ $vehiculo->id }}</th>
                            <td>{{ $vehiculo->placa }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>{{ $vehiculo->conductor->name }} {{ $vehiculo->conductor->apellido }}</td>
                            <td>
                                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-sm btn-primary" title="Editar">
                                    <i class="fa fa-pencil-alt"></i>
                                    <span class="d-none d-lg-inline-block">Editar</span>
                                </a>
                                @include('vehiculos.delete', ['id' => $vehiculo->id])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- <div class="d-flex justify-content-center">
                {{-- {!! $vehiculos->links() !!} --}}
            </div> -->
        </div>
    </div>
</div>
@endsection
