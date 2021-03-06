@extends('layouts.app')

@section('title') Lista de usuarios
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <table class="table table-hover table-responsive-sm">
                    <caption>Lista de usuarios</caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre completo</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }} {{ $usuario->apellido }} <span class="badge badge-success text-white font-weight-normal">{{ $usuario->rol() }}</span></td>
                            <td>{{ $usuario->celular }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil-alt"></i> <span class="d-none d-lg-inline-block">Editar</span></a>

                                @include('usuarios.delete', ['id' => $usuario])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
