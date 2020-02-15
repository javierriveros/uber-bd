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

    @if(!$pasajero)
        <div class="form-group @error('pasajero_id') is-invalid @enderror">
            {{ Form::label('pasajero_id', 'Pasajero') }}
            {{ Form::select('pasajero_id', $usuarios, $factura->pasajero_id, ['class' => 'form-control', 'required' => 'required']) }}

            @error('pasajero_id')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
    @endif

    <div class="form-group @error('tarifa_id') is-invalid @enderror">
        {{ Form::label('tarifa_id', 'Destino') }}
        {{ Form::select('tarifa_id', $tarifas, null, ['class' => 'form-control', 'required' => 'required']) }}

        @error('tarifa_id')
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>

    <div class="form-group @error('metodo_pago_id') is-invalid @enderror">
        {{ Form::label('metodo_pago_id', 'Método de pago') }}
        {{ Form::select('metodo_pago_id', $metodos_pago, $factura->metodo_pago_id, ['class' => 'form-control', 'required' => 'required']) }}

        @error('metodo_pago_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group @error('vehiculo_id') is-invalid @enderror">
        {{ Form::label('vehiculo_id', 'Vehículo') }}
        {{ Form::select('vehiculo_id', $vehiculos, $factura->vehiculo_id, ['class' => 'form-control', 'required' => 'required']) }}

        @error('vehiculo_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group text-right">
        {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
    </div>
{!! Form::close() !!}
