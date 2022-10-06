@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard {{ $roleName }}</h1>
@stop

@section('css')
<style>
    a{
        color: black;
    }

    a:hover{
        color: black;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
    {{-- <p>Hello</p> --}}
    <!-- <div class="d-flex flex-row flex-wrap" style="gap: 2rem;">
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
    </div> -->

    <div class="d-flex flex-row flex-wrap">
        <!-- <a class="col-3" href="{{ route('news.index') }}">
            <x-adminlte-info-box title="Total News" text="{{ count($news) }}" icon="fas fa-lg fa-newspaper" icon-theme="navy" />
        </a> -->
        <a class="col-3" href="{{ route('genre.index') }}">
            <x-adminlte-info-box title="Total Genres" text="{{ count($genre) }}" icon="fas fa-lg fa-tag" icon-theme="navy" />
        </a>
        <a class="col-3" href="{{ route('anime.index') }}">
            <x-adminlte-info-box title="Total Animes" text="{{ count($anime) }}" icon="fas fa-lg fa-film" icon-theme="navy" />
        </a>
        <a class="col-3" href="{{ route('series.index') }}">
            <x-adminlte-info-box title="Total Series" text="{{ count($series) }}" icon="fas fa-lg fa-folder" icon-theme="navy" />
        </a>
        <a class="col-3" href="{{ route('episode.index') }}">
            <x-adminlte-info-box title="Total Episodes" text="{{ count($episode) }}" icon="fas fa-lg fa-layer-group" icon-theme="navy" />
        </a>
        <a class="col-3" href="{{ route('kyojin.index') }}">
            <x-adminlte-info-box title="Total Characters" text="{{ count($kyojin) }}" icon="fas fa-lg fa-user-astronaut" icon-theme="navy" />
        </a>
        <a class="col-3" href="{{ route('anime.index') }}">
            <x-adminlte-info-box title="Total Users" text="{{ count($anime) }}" icon="fas fa-lg fa-users" icon-theme="navy" />
        </a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

