@extends('adminlte::page')
@section('title', 'Edit Anime')

@section('content_header')
<h1>Edit Anime</h1>
@endsection

@section('content')
<form action="{{ route('anime.update', $anime->id) }}" method="POST" class="container">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <label>Edit Anime</label>
        </div>

        <div class="card-body">
            <!-- 'cover', 'title', 'article', 'plot', 'production' -->
            <div class="row">
                <x-adminlte-input type="url" name="cover" label="Cover" placeholder="Please insert link" value="{{ old('image', $anime->cover) }}" fgroup-class="col-md-6">
                </x-adminlte-input>

                <x-adminlte-input type="text" name="title" label="Title" placeholder="1" fgroup-class="col-md-6" value="{{ old('title', $anime->title) }}">
                </x-adminlte-input>
            </div>

            <x-adminlte-textarea name="article" label="Article" placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!" rows=5> {{ old('article', $anime->article)}}
            </x-adminlte-textarea>

            <x-adminlte-textarea name="plot" label="Plot" placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!" rows=5> {{ old('plot', $anime->plot)}}
            </x-adminlte-textarea>

            <x-adminlte-textarea name="production" label="Production" placeholder="The ending illustration for Shingeki no Kyojin Season 4 Episode 15 (Also episode 74 total), featuring young Zeke and Tom Ksaver drawn by key animator Lu Taiwei!" rows=5> {{ old('production', $anime->production)}}
            </x-adminlte-textarea>


            <div class="d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                <x-adminlte-button class="btn bg-dark" label="Save Changes" type="submit"></x-adminlte-button>
            </div>
        </div>

    </div>
</form>
@endsection