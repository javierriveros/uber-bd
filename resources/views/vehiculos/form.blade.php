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
        {{ Form::label('placa', 'Placa') }}
        {{ Form::text('placa', $vehiculo->placa, ['class' => 'form-control', 'required' => 'required']) }}

        @error('placa')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group {!! $errors->first('name', 'has-error') !!}">
        {{ Form::label('modelo', 'Modelo') }}
        {{ Form::text('modelo', $vehiculo->modelo, ['class' => 'form-control', 'required' => 'required']) }}

        @error('modelo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group {!! $errors->first('name', 'has-error') !!}">
        {{ Form::label('color', 'Color') }}
        {{ Form::text('color', $vehiculo->color, ['class' => 'form-control', 'required' => 'required']) }}

        @error('color')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
