{!! Form::open(['route' => $route, 'method' => $method]) !!}
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

    <div class="form-group {!! $errors->first('name', 'has-error') !!}">
        {{ Form::label('nombre_barr', 'Nombre del barrio') }}
        {{ Form::text('nombre_barr', $ubicacion->nombre_barr, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group {!! $errors->first('name', 'has-error') !!}">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion', $ubicacion->direccion, ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
