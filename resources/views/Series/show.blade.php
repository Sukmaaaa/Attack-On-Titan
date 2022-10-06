@extends('adminlte::page')

@section('title', 'Series Detail')
@section('dashboard_url', 'AuditLog')
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
    <div class="card-header">Series Detail</div>

    <div class="card-body">
        <div class="row md-6">
            <label class="col-6">Cover:</label>
            <label class="col-6">Trailer:</label>
        </div>

        <div class="row">
            <div class="col-6"><img src="{{ $series->cover }}" height="315"></div>
            <!-- <div class="col"><video src="{{ $series->trailer }}" controls></video></div> -->

            <iframe width="560" height="315" src="{{ $series->trailer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>

        <div class="row md-6 mt-5">
            <label class="col-6">Title:</label>
            <label class="col-6">Country of Origin:</label>
        </div>

        <div class="row md-6">
            <div class="col-6">{{ $series->title }}</div>
            <div class="col-6">{{ $series->countryOfOrigin }}</div>
        </div>

        <div class="row mt-5">
            <label class="col">Article</label>
        </div>

        <div>{{ $series->article }}</div>

        <div class="row mt-5">
            <label class="col-6">Original Release</label>
            <label class="col-6">Genre</label>
        </div>

        <div class="row d-flex flex-wrap">
            <div class="col-6">{{ $series->originalRelease }}</div>

            <div class="col-6">
                @foreach($genreName as $genre)
                <p>{{$genre}}</p>
                @endforeach
            </div>
        </div>

        <div class="row">
            <label class="col">Total Episode</label>
            <label class="col">Anime</label>
        </div>

        <div class="row">
            <p class="col-md-6">{{ count($episodes) }}</p>
            <div class="col">{{ $animeHasSeries->title }}</div>
        </div>

        <div class="row">
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 col-md-12">Back</a>
        </div>


    </div>
</div>
@endsection