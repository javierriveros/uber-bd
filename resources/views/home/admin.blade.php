@extends('layouts.app')

@section('title') Administrar recursos
@endsection

@section('content')
    <div class="container">
        <div class="row mb-4 justify-content-center align-items-center">
            <div class="col-12 text-center mb-3">
                <h2 class="border-bottom pb-2">Administrar recursos</h2>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-user"></i>
                        </div>
                        <span>Usuarios</span>
                    </div>
                    <a class="card-footer text-white small" href="{{ route('usuarios.index') }}">
                        <span class="float-left">Administrar</span>
                        <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-location-arrow"></i>
                        </div>
                        <span>Ubicaciones</span>
                    </div>
                    <a class="card-footer text-white small" href="{{ route('ubicaciones.index') }}">
                        <span class="float-left">Administrar</span>
                        <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-credit-card"></i>
                        </div>
                        <span>Métodos de pago</span>
                    </div>
                    <a class="card-footer text-white small" href="{{ route('metodos_pago.index') }}">
                        <span class="float-left">Administrar</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-car"></i>
                        </div>
                        <span>Vehículos</span>
                    </div>
                    <a class="card-footer text-white small" href="{{ route('usuarios.index') }}">
                        <span class="float-left">Administrar</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
                <div class="card text-dark bg-light">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-money-bill-wave"></i>
                        </div>
                        <span>Tarifas</span>
                    </div>
                    <a class="card-footer text-dark small" href="{{ route('tarifas.index') }}">
                        <span class="float-left">Administrar</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mb-2 mt-1">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-calculator"></i>
                        </div>
                        <span>Facturas</span>
                    </div>
                    <a class="card-footer text-white small" href="{{ route('facturas.index') }}">
                        <span class="float-left">Administrar</span>
                        <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <h2 class="border-bottom pb-2">Bitácoras</h2>
                    </div>
                    <div class="col-12 mb-2 mt-1">
                        <div class="card text-dark bg-light">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-user"></i>
                                </div>
                                <span>Usuarios</span>
                            </div>
                            <a class="card-footer text-dark small" href="{{ route('bitacoras.usuarios') }}">
                                <span class="float-left">Ver</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 mb-2 mt-1">
                        <div class="card text-dark bg-light">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-calculator"></i>
                                </div>
                                <span>Facturas</span>
                            </div>
                            <a class="card-footer text-dark small" href="{{ route('bitacoras.facturas') }}">
                                <span class="float-left">Ver</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <h2 class="border-bottom pb-2">Reportes</h2>
                    </div>
                    <div class="col-12 mb-2 mt-1">
                        <div class="card text-dark bg-light">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-user"></i>
                                </div>
                                <span>Usuarios</span>
                            </div>
                            <a class="card-footer text-dark small" href="{{ route('usuarios.reporte') }}">
                                <span class="float-left">Ver</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 mb-2 mt-1">
                        <div class="card text-dark bg-light">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-calculator"></i>
                                </div>
                                <span>Facturas</span>
                            </div>
                            <a class="card-footer text-dark small" href="{{ route('facturas.reporte') }}">
                                <span class="float-left">Ver</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 mb-2 mt-1">
                        <div class="card text-dark bg-light">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-calculator"></i>
                                </div>
                                <span>Facturas</span>
                            </div>
                            <a class="card-footer text-dark small" href="{{ route('bitacoras.facturas') }}">
                                <span class="float-left">Ver</span>
                                <span class="float-right"><i class="fa fa-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
