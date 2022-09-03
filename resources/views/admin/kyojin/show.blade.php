@extends('adminlte::page')

@section('title', 'Character detail') 
@section('dashboard_url', 'Character')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)  

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>detail</h1></h1>
</div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('characterShow.css') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <label>Character Detail</label>
    </div>

    <div class="card-body">
        
        {{-- <div class="display:flex" style="text-align: center">
            <img src="{{ $kyojin->image }}" width="200px">
        </div> --}}

        {{-- PART 1 --}}
        <div class="row md-6">
            <label class="col">Image</label>
            <label class="col">Name</label>
            
        </div>

        <div class="row">
            <div class="col"> <img src="{{ $kyojin->image }}" width="200px"> </div>
            <div class="col">{{$kyojin->name}}</div>
            
        </div>
        {{-- END PART 1 --}}
        
        {{-- PART 2 --}}
        <div class="row mt-4">
            <label class="col">Species</label>
            <label class="col">Gender</label>
            
        </div>

        <div class="row">
            <div class="col">{{$kyojin->species}}</div>
            <div class="col">{{$kyojin->gender}}</div>
            
        </div>
        {{-- END PART 2 --}}

        {{-- PART 3 --}}
        <div class="row mt-4">
            <label class="col">Height</label>
            <label class="col">Weight</label>
        </div>
        
        <div class="row md-6">
            <div class="col">{{$kyojin->height}}cm</div>
            <div class="col">{{$kyojin->weight}}kg</div>  
        </div>
        {{-- END PART 3 --}}

        {{-- PART 4 --}}
        <div class="row mt-4">
            <label class="col">Birtday</label> 
            <label class="col">Description</label> 
        </div>

        <div class="row">
            <div class="col">{{$kyojin->birthday}}</div>
            <div class="col-6">{{$kyojin->description}}</div>
        </div>
        {{-- END PART 4 --}}

        <div class="container">  
            <a href="{{ url()->previous() }}" class="btn btn-primary container mt-4">Back</a> 
        </div>

    </div>
</div>
@endsection