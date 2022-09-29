@extends('adminlte::page')
@section('title', 'Add Anime')

@section('content_header')
<h1>Add Anime</h1>
@endsection

@section('content')
@if (Session::has('alert'))
<div class="alert alert-danger">{{ Session::get('alert') }}</div>
@endif

<form action="{{ route('anime.store') }}" method="POST" class="container">
    @csrf
    <div class="card">
        <div class="card-header" theme="dark">
            <label>Add Anime</label>
        </div>
        <div class="card-body">
            <!-- 'cover', 'title', 'article', 'plot', 'production' -->
            <div class="row">
                <x-adminlte-input type="url" name="cover" label="Cover" placeholder="https//cdn-2.tstatic.net/style/foto/bank/images/kimi-no-nawa_20170118_142451.jpg" fgroup-class="col-md-6">
                </x-adminlte-input>
                <x-adminlte-input type="text" name="title" label="Title" placeholder="Kimi no Na Wa" fgroup-class="col-md-6">
                </x-adminlte-input>
            </div>

            <x-adminlte-textarea name="article" label="Article" placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!" rows=5>
            </x-adminlte-textarea>

            <x-adminlte-textarea name="plot" label="Plot" placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!" rows=5>
            </x-adminlte-textarea>

            <x-adminlte-textarea name="production" label="Production" placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!" rows=5>
            </x-adminlte-textarea>

            <div class="d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                <x-adminlte-button class="btn bg-dark" label="Add Anime" type="submit"></x-adminlte-button>
            </div>
        </div>
</form>
@endsection