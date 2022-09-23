@extends('adminlte::page')

@section('title', 'Genre Detail') 
@section('dashboard_url', 'AuditLog')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)  

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>detail</h1></h1>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">Genre Detail</div>

    <div class="card-body">
        <div class="row md-6">
            <label class="col-6">Name</label>
        </div>

        <div class="row">
            <div class="col-6">{{ $genre->name }}</div>
        </div>

        <div class="row md-6 mt-3">
            <label class="col-6">Definition</label>
        </div>

        

        <div class="row">
            <adminlte-text-area class="col-12">{{ $genre->definition }}</adminlte-text-area>
        </div>
        <div class="row">  
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 col-md-12">Back</a> 
        </div>

    </div>
</div>
@endsection