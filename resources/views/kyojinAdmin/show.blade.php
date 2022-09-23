@extends('adminlte::page')

@section('title', 'User Detail') 
@section('dashboard_url', 'User Detail')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)  

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>detail</h1></h1>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header"> 
        <label>User Detail</label>
    </div>

    <div class="card-body">
        <div class="row md-6">
            <label class="col">Name</label>
            <label class="col">Email</label>
        </div>
        
        <div class="row md-6">
            <div class="col">{{ $user->name }}</div>
            <div class="col">{{ $user->email }}</div>
        </div>

        <div class="row mt-3">
            <label class="col">Role</label>
        </div>


        <div class="row">
            <div class="col">{{ $user->getRoleNames()[0] }}</div>
        </div>

        <div class="row">  
            <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 col-md-12">Back</a> 
        </div>

    </div>
</div>

@endsection