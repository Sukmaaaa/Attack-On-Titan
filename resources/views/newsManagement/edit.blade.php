@extends('adminlte::page')
@section('title', 'Edit News')

@section('content_header')
    <h1>Edit News</h1>
@endsection

@section('content')
    <form action="{{ route('news.update', $news->id) }}" method="POST" class="container">
        @csrf
        @method('PUT')
        <x-adminlte-input type="url" name="image" label="Image:" placeholder="Please insert link"
            value="{{ old('image', $news->image) }}">
        </x-adminlte-input>
        <div class="row">
            <x-adminlte-input type="text" name="article" label="Article:" placeholder="Eren Yeager"
                fgroup-class="col-md-12" value="{{ old('name', $news->article) }}">
            </x-adminlte-input>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Save Changes" type="submit"></x-adminlte-button>
        </div>
    </form>
@endsection
