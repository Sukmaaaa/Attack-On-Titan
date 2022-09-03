@extends('adminlte::page')
@section('title', 'Add User')

@section('content_header')
    <h1>Add User</h1>
@endsection

@section('content')
    @if (Session::has('alert'))
        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
    @endif

    <form action="{{ route('adminKyojin.store') }}" method="POST" class="container">
        @csrf
       
        <div class="card">
            <div class="card-header">
                Add User
            </div>
            <div class="card-body">
        <x-adminlte-input type="text" name="name" label="Name:" placeholder="Yelena">
        </x-adminlte-input>

        <div class="row">
            <x-adminlte-input type="email" name="email" label="Email:" placeholder="Admin@kyojin.com" fgroup-class="col-md-6">
                </x-adminlte-input>
            
                <x-adminlte-select name="role" label="Role:" fgroup-class="col-md-6">
                    @foreach($role as $optionRole)
                        <option value ="{{ $optionRole->name }}"> {{ $optionRole->name }}
                    @endforeach
                </x-adminlte-select>
        </div>


            <x-adminlte-input type="password" name="password" label="Password:" placeholder="**********" pattern="{8,}">
            </x-adminlte-input>
        

        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Add User" type="submit"></x-adminlte-button>
        </div>
</div>
</form>
@endsection