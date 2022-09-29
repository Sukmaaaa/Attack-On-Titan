@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard {{ $roleName }}</h1>
@stop

@section('content')
    {{-- <p>Hello</p> --}}
    <div class="d-flex flex-row flex-wrap" style="gap: 2rem;">
        <div class="info-box col">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Total Character</span>
            <span class="info-box-number">{{ count($kyojin) }}</span>
            </div>
        </div>

        <div class="info-box col">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Total News</span>
            <span class="info-box-number">{{ count($kyojin) }}</span>
            </div>
        </div>

        <div class="info-box col">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Total Genre</span>
            <span class="info-box-number">{{ count($kyojin) }}</span>
            </div>
        </div>

        <div class="info-box col">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Total Series</span>
            <span class="info-box-number">{{ count($kyojin) }}</span>
            </div>
        </div>

        <div class="info-box col">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Total Episode</span>
            <span class="info-box-number">{{ count($kyojin) }}</span>
            </div>
        </div>

        <div class="info-box col">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Total User</span>
            <span class="info-box-number">{{ count($kyojin) }}</span>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // NOTIFICATION
         const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        })
        
        @if (Session::has('login'))
            Toast.fire({
                icon: 'success',
                title: 'Welcome!'
            })
        @endif
        console.log('Hi!');
    </script>
@stop
