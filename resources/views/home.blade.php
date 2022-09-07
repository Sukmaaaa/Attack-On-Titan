@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard {{ $roleName }}</h1>
@stop

@section('content')
    {{-- <p>Hello</p> --}}
    <div class="row">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Messages</span>
            <span class="info-box-number">1,410</span>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
