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

    <div class="form-group @error('nombre_met') is-invalid @enderror">
        {{ Form::label('nombre_met', 'Nombre del método de pago') }}
        {{ Form::text('nombre_met', $metodo_pago->nombre_met, ['class' => 'form-control', 'required' => 'required']) }}

        @error('nombre_met')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group @error('descuento') is-invalid @enderror">
        {{ Form::label('descuento', 'Descuento') }}
        {{ Form::number('descuento', $metodo_pago->descuento, ['class' => 'form-control', 'required' => 'required', 'min' => 0]) }}

        @error('descuento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
