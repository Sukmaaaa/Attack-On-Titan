@extends('adminlte::page')
@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@endsection

@section('content')
    <form action="{{ route('profile.update', $user->id) }}" method="POST" class="container">
        @csrf
        @method('PUT')
        @if (Session::has('alert'))
            <div class="alert alert-danger">{{ Session::get('alert') }}</div>
        @endif
        <div class="row">
            <x-adminlte-input type="text" label="Name: " name="name" placeholder="Eren Yeager"
                value="{{ old('name', $user->name) }}" fgroup-class="col-sm-6" required></x-adminlte-input>
            <x-adminlte-input type="email" label="Email: " name="email" placeholder="eren@kyojin.com"
                value="{{ old('email', $user->email) }}" fgroup-class="col-sm-6" readonly required></x-adminlte-input>
        </div>
        <x-adminlte-input type="password" label="Password: " name="password" placeholder="*********" required>
        </x-adminlte-input>
        <x-adminlte-input type="password" label="New Password: " name="new_password" placeholder="*********">
        </x-adminlte-input>
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Update Profile" type="submit"></x-adminlte-button>
        </div>
    </form>
@endsection
