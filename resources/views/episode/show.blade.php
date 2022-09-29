@extends('adminlte::page')

@section('title', 'Episode Detail')
@section('dashboard_url', 'Episode')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>detail</h1>
    </h1>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">New Detail</div>
    <!-- 'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description' -->
    <div class="card-body">


        <div class="row md-6">
            <label class="col">Title Card:</label>
            <label class="col">No in Season:</label>
        </div>

        <div class="row">
            <div class="col-6"> <img src="{{ $episode->titleCard }}" width="200px"></div>
            <div class="col-6">{{$episode->noInSeason}}</div>
        </div>

        <div class="row mt-5">
            <label class="col">Directer by:</label>
            <label class="col">Writen by:</label>
        </div>

        <div class="row">
            <div class="col-6">{{ $episode->directedBy }}</div>
            <div class="col-6">{{ $episode->writenBy }}</div>
        </div>

        <div class="row mt-5">
            <label class="col">Description</label>
        </div>

        <div class="row">
            <div class="col">{{ $episode->description }}</div>
        </div>

        <div class="row mt-5">
            <label class="col">Original Air Date:</label>
            <label class="col">Season:</label>
        </div>

        <div class="row">
            <div class="col">{{ $episode->originalAirDate }}</div>
            <div class="col">{{ $seriesHasEpisode->title }}</div>
        </div>

        <div class="row">
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 col-md-12">Back</a>
        </div>

    </div>
</div>
@endsection