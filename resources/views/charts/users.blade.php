@extends('layouts.app')

@section('title')
    Reporte de usuarios
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                {!! $reporteUsuarios->container() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- ChartScript --}}
    {!! $reporteUsuarios->script() !!}
@endsection
