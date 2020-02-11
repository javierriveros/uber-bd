@extends('layouts.app')
@section('title') Administrar ubicaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <table class="table table-hover">
                    <caption>Lista de ubicaciones</caption>
                    <a
                        href="{{ route('ubicaciones.create') }}"
                        class="btn btn-sm btn-success my-4"
                        title="Añadir ubicación">
                        <i class="fas fa-plus"></i> Añadir ubicación
                    </a>

                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre Barrio</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ubicaciones as $ubicacion)
                        <tr>
                            <th scope="row">{{ $ubicacion->id }}</th>
                            <td>{{ $ubicacion->nombre_barr }}</td>
                            <td>{{ $ubicacion->direccion }}</td>
                            <td>
                                <a
                                    href="{{ route('ubicaciones.edit', $ubicacion->id) }}"
                                    class="btn btn-sm btn-primary"
                                    title="Editar"
                                >
                                    <i class="fa fa-pencil-alt"></i>
                                    <span class="d-none d-lg-inline-block">
                                         Editar
                                    </span>
                                </a>

                                @include('ubicaciones.delete', ['id' => $ubicacion->id])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <!-- <div class="d-flex justify-content-center">
                {{-- {!! $ubicaciones->links() !!} --}}
                </div> -->
            </div>
        </div>
    </div>
@endsection
