@extends('layouts.app')

@section('title')
    Reporte de roles
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                {!! $reporte->container() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- ChartScript --}}
    {!! $reporte->script() !!}
@endsection
