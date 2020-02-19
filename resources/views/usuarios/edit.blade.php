@extends('layouts.app')

@section('title') Editar usuario
@endsection
@section('content')
    <main class="container">
        <article class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 mt-4">
                <div class="card">
                    <div class="card-header"><h3 class="m-0">Actualizar usuario</h3></div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['usuarios.update', $usuario], 'method' => 'PUT']) !!}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Errores:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            {{ Form::label('email', 'Correo')}}
                            {{ Form::email('email', $usuario->email, ['class' => 'form-control', 'readonly' => true,
                            'disabled' => true]) }}

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('name', 'Nombre')}}
                            {{ Form::text('name', $usuario->name, ['class' => 'form-control', 'required' => true]) }}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('apellido', 'Apellido')}}
                            {{ Form::text('apellido', $usuario->apellido, ['class' => 'form-control', 'required' => true]) }}
                            @error('apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('celular', 'Celular')}}
                            {{ Form::text('celular', $usuario->celular, ['class' => 'form-control', 'required' => true]) }}
                            @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @if (Auth::user()->esAdministrador())
                            <div class="form-group">
                                {{ Form::label('tipo', 'Tipo de usuario')}}
                                {{ Form::select('tipo', [
                                    '1' => 'Pasajero',
                                    '2' => 'Conductor',
                                    '3' => 'Administrador'
                                ], $usuario->tipo, ['class' => 'form-control']) }}
                            </div>
                            @error('tipo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">
                                <i class="fa fa-save"></i>
                                Guardar Cambios
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </article>
    </main>
@endsection
