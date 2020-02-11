@extends('layouts.app')
@section('title') Administrar métodos de pago
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <table class="table table-hover">
                    <caption>Lista de métodos de pago</caption>
                    <a href="{{ route('metodos_pago.create') }}" class="btn btn-sm btn-success my-4"
                       title="Añadir ubicación">
                        <i class="fas fa-plus"></i> Añadir método de pago
                    </a>

                    <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descuento</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($metodos_pago as $metodo_pago)
                        <tr>
                            <th scope="row">{{ $metodo_pago->id }}</th>
                            <td>{{ $metodo_pago->nombre_met }}</td>
                            <td>{{ $metodo_pago->descuento }}</td>
                            <td>
                                <a href="{{ route('metodos_pago.edit', $metodo_pago->id) }}"
                                   class="btn btn-sm btn-primary"
                                   title="Editar"><i class="fa fa-pencil-alt"></i> <span
                                        class="d-none d-lg-inline-block"> Editar</span></a>
                            </td>
                            <td>
                                @include('metodos_pago.delete', ['id' => $metodo_pago->id])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
