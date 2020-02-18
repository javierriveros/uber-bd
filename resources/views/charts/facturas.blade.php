@extends('layouts.app')

@section('title')
    Reporte de facturas
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                {!! $reporteFacturas->container() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- ChartScript --}}
    {!! $reporteFacturas->script() !!}
@endsection
