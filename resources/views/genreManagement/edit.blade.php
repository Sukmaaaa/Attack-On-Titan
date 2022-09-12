@extends('adminlte::page')
@section('title', 'Edit Genre')

@section('content_header')
    <h1>Edit Genre</h1>
@endsection

@section('content')
    <form action="{{ route('genre.update', $genre->id) }}" method="POST" class="container">
        @csrf
        @method('PUT')
        <x-adminlte-input type="text" name="name" label="Genre name:" placeholder="comedy"
            value="{{ old('name', $genre->name) }}">
        </x-adminlte-input>
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Update Role" type="submit"></x-adminlte-button>
        </div>

    </form>
@endsection
