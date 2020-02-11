@extends('layouts.app')
@section('title') Administrar ubicaciones
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <table class="table table-hover table-responsive-sm">
                <caption>Lista de ubicaciones</caption>
                <a href="{{ route('ubicaciones.create') }}" class="btn btn-sm btn-success my-4" title="Añadir ubicación">
                    Añadir ubicación
                </a>

                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nombre Barrio</th>
                        <th>Dirección</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ubicaciones as $ubicacion)
                        <tr>
                            <th scope="row">{{ $ubicacion->id }}</th>
                            <td>{{ $ubicacion->nombre_barr }}</td>
                            <td>{{ $ubicacion->direccion }}</td>
                            <td>
                                <a href="{{ route('ubicaciones.edit', $ubicacion->id) }}" class="btn btn-sm btn-primary"
                                    title="Editar"><span class="d-none d-lg-inline-block">Editar ubicación</span></a>
                            </td>
                            <td>
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
