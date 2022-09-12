@extends('adminlte::page')
@section('title', 'Add Genre')

@section('content_header')
    <h1>Add Genre</h1>
@endsection

@section('content')
    <form action="{{ route('genre.store') }}" method="POST" class="container">
        @csrf
        <x-adminlte-input type="text" name="name" label="Genre name:" placeholder="comedy">
        </x-adminlte-input>
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Add Role" type="submit"></x-adminlte-button>
        </div>

    </form>
@endsection
