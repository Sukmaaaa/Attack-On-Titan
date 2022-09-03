@extends('adminlte::page')
@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@endsection

@section('content')
    <form action="{{ route('adminKyojin.update', $user->id) }}" method="POST" class="container">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <x-adminlte-input type="text" name="name" label="Name:" placeholder="Yelena"
                    value="{{ old('name', $user->name) }}">
                </x-adminlte-input>

                <div class="row">
                    <x-adminlte-input type="email" name="email" label="Email:" placeholder="Admin@kyojin.com"
                        fgroup-class="col-md-6" value="{{ old('email', $user->email) }}">
                    </x-adminlte-input>

                    <x-adminlte-select name="role" label="Role:" fgroup-class="col-md-6">
                        @foreach($role as $optionRole)
                            <option value ="{{ $optionRole->name }}"> {{ $optionRole->name }}
                        @endforeach
                    </x-adminlte-select>

                </div>

               
                
                <div class="d-flex flex-row justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    <x-adminlte-button class="btn bg-dark" label="Edit" type="submit"></x-adminlte-button>
                </div>
            </div>
        </div>
    </form>
@endsection
