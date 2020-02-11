@extends('layouts.app')

@section('title')
    Inicio
@endsection

@section('content')
    <div
        class="position-relative overflow-hidden p-3 p-md-5 ml-md-3 mb-md-3 mr-md-3 text-center bg-light main text-white"
        style="background-image: url('{{asset('img/bg.jpg')}}');">
        <div class="col-md-12 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Ponte al volante y genera ganancias</h1>
            <p class="lead font-weight-normal">Conduce con la plataforma que tiene la mayor cantidad de usuarios
                activos.</p>
            <a class="btn btn-secondary" href="{{route('login')}}">Accede ahora</a>
        </div>
    </div>

    <div class="d-md-flex w-100 my-md-3 pl-md-3">
        <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden flex-fill">
            <div class="my-3 py-3">
                <h2 class="display-5">Regístrate para conducir</h2>
                <p class="lead">Conduce con Uber <br>Gana dinero en tu horario.</p>
                <a href="{{route('register', ['tipo' => 2])}}">Registrarme →</a>
            </div>
            <img src="{{ asset('img/car1.svg') }}" alt="" class="img-fluid w-75"/>
        </div>
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden  flex-fill">
            <img src="{{ asset('img/car2.svg') }}" alt="" class="img-fluid w-75"/>
            <div class="my-3 p-3">
                <h2 class="display-5">Regístrate para viajar</h2>
                <p class="lead">Paseos confiables en minutos.</p>
                <a href="{{route('register', ['tipo' => 1])}}">Registrarme →</a>
            </div>
        </div>
    </div>

    <footer class="container pt-5 pb-3 border-top mx-auto mt-4">
        <p class="float-right"><a href="#0">Volver arriba</a></p>
        <p>&copy; 2020 Uber, Inc. &middot; Todos los derechos reservados</p>
    </footer>

@endsection
