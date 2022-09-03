@extends('adminlte::page')
@section('title', 'Add News')

@section('content_header')
    <h1>Add News</h1>
@endsection

@section('content')
    @if (Session::has('alert'))
        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
    @endif

    <form action="{{ route('news.store') }}" method="POST" class="container">
        @csrf
        <div class="card">
            <div class="card-header" theme="dark">
                Add News
            </div>
            <div class="card-body">
        <x-adminlte-input type="url" name="image" label="Image:" placeholder="Please insert link">
        </x-adminlte-input>
       
        <x-adminlte-textarea name="article" label="Article:"
            placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!"
            rows=5>
        </x-adminlte-textarea>

        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Add News" type="submit"></x-adminlte-button>
        </div>
    </div>
        </form>
        @endsection