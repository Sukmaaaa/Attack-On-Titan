@extends('adminlte::page')

@section('title', 'Genre')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>Genre</h1>
    <a href="{{ route('genre.create') }}" class="btn bg-dark">Add Genre</a>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
@if ($message = Session::get('alert'))
<x-adminlte-alert theme="warning" title-class="text-danger text-uppercase" icon="fas fa-exclamation-triangle" title="Warning" dismissable id="pemberitahuan1">
    {{ $message }}
</x-adminlte-alert>
@endif
@if ($message = Session::get('success'))
<x-adminlte-alert theme="success" title-class="text-danger text-uppercase" icon="fas fas fa-thumbs-up" title="Success" dismissable id="pemberitahuan1">
    {{ $message }}
</x-adminlte-alert>
@endif
@if ($message = Session::get('primary'))
<x-adminlte-alert theme="primary" title-class="text-danger text-uppercase" icon="fas fa-info-circle" title="Info" dismissable id="pemberitahuan1">
    {{ $message }}
</x-adminlte-alert>
@endif
@if ($message = Session::get('danger'))
<x-adminlte-alert theme="danger" title-class="text-danger text-uppercase" icon="fas fa-lg fa-exclamation-circle" title="Danger" dismissable id="pemberitahuan1">
    {{ $message }}
</x-adminlte-alert>
@endif


@php

$heads = [['label' => 'No.', 'width' => 5], 'Genre', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
$i = 1;
$newroles = [];
foreach ($genres as $genre) {
$btnEdit = '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="' . route('genre.edit', $genre->id) . '"><i class="fa fa-lg fa-fw fa-pen"></i></a>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
$btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('genre.show', $genre->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';

$newRoles[] = [$i++, preg_replace('/\-/', ' ', $genre->name), '<form class="d-flex justify-content-center" onsubmit="return confirm" (\'Are you sure?\')" action="' . route('genre.destroy', $genre->id) . '" method="POST">' . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails .'</form>'];
}

$config = [
'data' => $newRoles,
'order' => [[1, 'asc']],
'columns' => [null, null, ['orderable' => false]],
];
@endphp

<div class="card">
    <div class="card-header">
        Genre List
    </div>
    <div class="card-body">
        <x-adminlte-datatable :config="$config" :heads="$heads" head-theme="dark" id="newsTable" theme="light" hoverable bordered beautify>
            @foreach ($config['data'] as $row)
            <tr>
                @foreach ($row as $cell)
                <td>{!! $cell !!}</td>
                @endforeach
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@endsection

<!-- @section('js')
    <script>
        var pemberitahuan = document.getElementById('pemberitahuan1');

        pemberitahuan !== null && setTimeout(() => {
            pemberitahuan.style.display = 'none'
        }, 3000);
    </script>
@endsection -->

@section('js')
<script>
    const pemberitahuan = document.getElementById('pemberitahuan1');

    pemberitahuan !== null && setTimeout(() => {
        pemberitahuan.style.display = 'none'
    }, 3000);
</script>
@endsection