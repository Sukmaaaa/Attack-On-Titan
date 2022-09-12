@extends('adminlte::page')
@section('title', 'Add Series')

@section('content_header')
    <h1>Add Series</h1>
@endsection

@section('content')
    @if (Session::has('alert'))
        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
    @endif

    <form action="{{ route('series.store') }}" method="POST" class="container">
        @csrf
        <div class="card">
            <div class="card-header">
                <label>Add Series</label>
            </div>

            <div class="card-body">
                <div class="row">
                    <x-adminlte-input type="text" name="title" label="Title:" placeholder="Season 1"
                        fgroup-class="col-md-6">
                    </x-adminlte-input>
                    <x-adminlte-input type="url" name="cover" label="Cover:" placeholder="Please insert link"
                        fgroup-class="col-md-6">
                    </x-adminlte-input>
                </div>

                <div class="row">
                    <x-adminlte-textarea type="text" name="article" label="Article :"
                        placeholder="The first season of the Attack on Titan anime television series was produced by IG Port's Wit Studio and directed by Tetsurō Araki, with Yasuko Kobayashi handling series composition and Kyōji Asano providing character designs"
                        fgroup-class="col-md-12">
                    </x-adminlte-textarea>
                </div>

                <div class="row">
                    <x-adminlte-input type="url" name="trailer" label="Trailer:" placeholder="Please insert link"
                        fgroup-class="col-md-6">
                    </x-adminlte-input>

                    <x-adminlte-input type="text" name="countryOfOrigin" label="Country of Origin:" placeholder="America"
                        fgroup-class="col-md-6">
                    </x-adminlte-input>

                </div>

                <div class="row">
                    <x-adminlte-input type="date" name="originalRelease" label="Original Release:" fgroup-class="col-12">
                    </x-adminlte-input>
                    <div class="col">
                        <label for="genreLabel">Genre:</label>
                        @foreach ($genres as $genre)
                            <div class="col icheck-primary">
                                <input type="checkbox" id="someCheckboxId" name="genre[]" value="{{ $genre->name }}" />
                                <label for="someCheckboxId">{{ preg_replace('/\-/', ' ', $genre->name) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    <x-adminlte-button class="btn bg-dark" label="Add Series" type="submit"></x-adminlte-button>
                </div>
    </form>
    </div>
    </div>
@endsection
