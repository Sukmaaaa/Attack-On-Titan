@extends('adminlte::page')

@section('title', 'Audit detail') 
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
    <div class="card-header">New Detail</div>

    <div class="card-body">
        <div class="row md-6">
            <label class="col-6">Image</label>
            <label class="col-6">Article</label>
        </div>

        <div class="row">
            <div class="col-6"><img src="{{ $news->image }}" width="200px"></div>
            <div class="col">{{ $news->article }}</div>
        </div>

        <div class="container">  
            <a href="{{ url()->previous() }}" class="btn btn-primary container mt-4">Back</a> 
        </div>

    </div>
</div>
@endsection