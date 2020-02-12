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

    <div class="form-group @error('valor') is-invalid @enderror">
        {{ Form::label('valor', 'Valor') }}
        {{ Form::number('valor', $tarifa->valor, ['class' => 'form-control', 'required' => 'required']) }}

        @error('valor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group @error('origen_id') is-invalid @enderror">
        {{ Form::label('origen_id', 'Origen') }}
        {{ Form::select('origen_id', $ubicaciones, null, ['class' => 'form-control', 'required' => 'required']) }}

        @error('origen_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group @error('destino_id') is-invalid @enderror">
        {{ Form::label('destino_id', 'Destino') }}
        {{ Form::select('destino_id', $ubicaciones, null, ['class' => 'form-control', 'required' => 'required']) }}

        @error('destino_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
