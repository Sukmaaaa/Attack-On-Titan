@extends('adminlte::page')
@section('title', 'Add Series')

@section('content_header')
    <h1>Add Series</h1>
@endsection

@section('content')
    @if (Session::has('alert'))
        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
    @endif
    // 'cover', 'trailer', 'title', 'genre' , 'article',  'countryOfOrigin', 'originalRelease'
    <form action="{{ route('series.store') }}" method="PUT" class="container">
        @csrf
        <x-adminlte-input type="url" name="cover" label="Cover:" placeholder="Please insert link" value="{{ old('cover', $series->cover) }}">
        </x-adminlte-input>

        <x-adminlte-input type="url" name="trailer" label="Trailer:" placeholder="Please insert link" value="{{ old('trailer', $series->trailer) }}">
        </x-adminlte-input>

        <div class="row">
            <x-adminlte-input type="text" name="title" label="Title:" placeholder="Season 1" fgroup-class="col-md-6" value="{{ old('title', $series->title) }}">
            </x-adminlte-input>
            <x-adminlte-select name="genre" label="Genre:" fgroup-class="col-md-6">
                <option value="Action">Action</option>
                <option value="Dark Fantasy">Dark Fantasy</option>
                <option value="Post Apocalyptic">Post Apocalyptic</option>
                <option value="Comedy">Comedy</option>
                <option value="Romance">Romance</option>
            </x-adminlte-select>
        </div>

        <div class="row">
            <x-adminlte-textarea type="text" name="article" label="Article :" placeholder="The first season of the Attack on Titan anime television series was produced by IG Port's Wit Studio and directed by Tetsurō Araki, with Yasuko Kobayashi handling series composition and Kyōji Asano providing character designs" fgroup-class="col-md-6" value="{{ old('article', $series->article) }}">
            </x-adminlte-textarea> 
            <x-adminlte-input type="text" name="countryOfOrigin" label="Country of Origin:" placeholder="America" fgroup-class="col-md-6">
            </x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input type="date" name="originalRelease" label="Original Release:" fgroup-class="col-md-12" value="{{ old('originalRelease', $series->originalRelease) }}">
            </x-adminlte-input>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Add Series" type="submit"></x-adminlte-button>
        </div>
    </form>
@endsection
