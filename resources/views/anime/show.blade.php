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
    <!-- 'cover', 'title', 'article', 'plot', 'production' -->
    <div class="card-body">

        <div class="row">
            <label class="col-md-6">Cover</label>
            <label class="col-md-6">Title</label>
        </div>

        <div class="row">
            <img class="col-md-6" src="{{$anime->cover}}" width="300">
            <div class="col-md-6">{{ $anime->title }}</div>
        </div>

        <label class="mt-5">Article</label>
        <div>{{ $anime->article }}</div>

        <label class="mt-5">Plot</label>
        <div>{{ $anime->plot }}</div>

        <label class="mt-5">Production</label>
        <div>{{ $anime->production }}</div>

        <div class="row">
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 col-md-12">Back</a>
        </div>

    </div>
</div>
@endsection