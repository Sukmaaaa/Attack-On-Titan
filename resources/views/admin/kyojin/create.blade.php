@extends('adminlte::page')
@section('title', 'Add Character')

@section('content_header')
    <h1>Add Character</h1>
@endsection

@section('content')
    @if (Session::has('alert'))
        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
    @endif
    
    <form action="{{ route('kyojin.store') }}" method="POST" class="container">
        @csrf
        <x-adminlte-input type="url" name="image" label="Image:" placeholder="Please insert link">
        </x-adminlte-input>
        <div class="row">
            <x-adminlte-input type="text" name="name" label="Name:" placeholder="Eren Yeager" fgroup-class="col-md-6">
            </x-adminlte-input>
            <x-adminlte-select name="species" label="Species:" fgroup-class="col-md-6">
                <option value="Human">Human</option>
                <option value="Titan">Titan</option>
            </x-adminlte-select>
        </div>
        <div class="row">
            <x-adminlte-select name="gender" label="Gender:" fgroup-class="col-md-6">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Unknown">Unknown</option>
            </x-adminlte-select>
            <x-adminlte-input type="number" name="height" label="Height:" placeholder="180cm" fgroup-class="col-md-6">
            </x-adminlte-input>
        </div>
        <div class="row">
            <x-adminlte-input type="number" name="weight" label="Weight:" placeholder="75kg" fgroup-class="col-md-6">
            </x-adminlte-input>
            <x-adminlte-input type="date" name="birthday" label="Birthday:" fgroup-class="col-md-6">
            </x-adminlte-input>
        </div>
        <x-adminlte-textarea name="description" label="Description:"
            placeholder="Eren Yeager, named Eren Jaeger in the subtitled and dubbed versions of the anime Attack on Titan, is a fictional character..."
            rows=5>
        </x-adminlte-textarea>
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Add Character" type="submit"></x-adminlte-button>
        </div>
    </form>
@endsection
