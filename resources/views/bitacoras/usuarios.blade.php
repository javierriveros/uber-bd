@extends('layouts.app')

@section('title') Lista de usuarios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-hover table-responsive-sm">
                    <caption>Bitácora de usuarios</caption>
                    <thead>
                        <tr>
                            <th>Operación</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>ID</th>
                            <th>Nombre completo</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{ $usuario->operacion }}</th>
                            <td>{{ $usuario->usuario }}</td>
                            <td>{{ date('Y m d H:i:s',strtotime($usuario->fecha)) }}</td>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }} {{ $usuario->apellido }}</td>
                            <td>{{ $usuario->celular }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <span class="badge badge-success text-white font-weight-normal">
                                    @if($usuario->tipo == 3)
                                        Administrador
                                    @elseif($usuario->tipo == 2)
                                        Conductor
                                    @else
                                        Pasajero
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
