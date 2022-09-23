@extends('adminlte::page')
@section('title', 'Add Genre')

@section('content_header')
    <h1>Add Genre</h1>
@endsection

@section('content')
    <form action="{{ route('genre.store') }}" method="POST" class="container">
        @csrf
        
        <div class="card">
            <div class="card-header">
                <label>Add Genre</label>
            </div>

            <div class="card-body">
                <x-adminlte-input type="text" name="name" label="Genre name:" placeholder="comedy">
                </x-adminlte-input>

                <x-adminlte-textarea type="text" name="definition" label="Description:" placeholder="
                Falling in love and struggling to progress towards—or maintain—a romantic relationship take priority, while other subplots either take backseat or are designed to develop the main love story. The narrative focuses on the thoughts and emotions of the characters, illustrating the connections between them and explaining their reactions to events or conflict. Almost always, the story ends happily and the couple is rewarded for their efforts with lasting love." rows=5>
                </x-adminlte-textarea>
                <div class="d-flex flex-row justify-content-between">
                    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                    <x-adminlte-button class="btn bg-dark" label="Save" type="submit"></x-adminlte-button>
                </div>
            </div>

        </div>

    </form>
@endsection
