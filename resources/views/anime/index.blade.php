@extends('adminlte::page')

@section('title', 'Anime')
@section('dashboard_url', 'anime')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>Anime List</h1>
    @if (auth()->user()->can('create-anime'))
    <a href="{{ route('anime.create') }}" class="btn bg-dark">Add Anime</a>
    @endif
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')

@php

$heads = ['No.', 'Cover', 'Title', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
$i = 1;
$newAnime = [];
foreach ($anime as $animes) {
$btnEdit = auth()
->user()
->can('edit-anime')
? '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('anime.edit', $animes->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>'
: '';
$btnDelete = auth()
->user()
->can('delete-anime')
? "<button class='btn btn-xs btn-default shadow mx-1' id='btnDelete' onclick='showDelete(".json_encode($animes->getOriginal()).", ".'"'.route('anime.update', $animes->id).'"'.")' data-toggle='modal' data-target='#modalDelete' title='Delete'><i class='fa fa-lg fa-fw fa-trash text-danger'></i></button>"
: '';
$btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('anime.show', $animes->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
$formActions = '<div class="d-flex justify-content-center">' . $btnEdit . ' ' . $btnDelete . ' ' . $btnDetails . '</div>';

$newAnime[] = [$i++, '<img src="'.$animes->cover.'" width="155px">', $animes->title, $formActions ];
}

$config = [
'data' => $newAnime,
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

<div class="card">
    <div class="card-header">
        Anime List
    </div>
    <div class="card-body">
        <x-adminlte-datatable :config="$config" :heads="$heads" head-theme="dark" id="animeTable" theme="light" hoverable bordered beautify>
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

<!-- MODAL DELETE ANIME -->
@if (count($anime) >= 1)
<x-adminlte-modal id="modalDelete" title="Delete Anime" theme="danger" icon="fas fa-newspaper" size='md' v-centered scrollable>
    <div class="temp">

        <x-slot name="footerSlot"></x-slot>
</x-adminlte-modal>
@endif
<!-- END MODAL DELETE ANIME -->
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // MODAL
    const modalDelete = document.querySelector(
        "#modalDelete > div > div > div.modal-body"
    );

    let showDelete = (anime, route) => {
        console.log(anime)
        let content =
            `<form action="${route}" method="POST" class="d-flex flex-column justify-content-center align-items-center">{{ csrf_field() }}<input type="hidden" name="_method" value="DELETE"> <h4 class="font-weight-bold text-center">${anime.title}</h4> <img class="img-fluid" src="${anime.cover}" width="300"> <p>Are you sure?</p><x-adminlte-button label="Yes, delete!" theme="danger" class="w-100" type="submit"/></form>`;

        return (modalDelete.innerHTML = content);
    }
    // NOTIFICATION
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    })

    @if(Session::has('success'))
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('
        success ') }}'
    })
    @endif
    @if(Session::has('danger'))
    Toast.fire({
        icon: 'error',
        title: '{{ Session::get('
        danger ') }}'
    })
    @endif
    @if(Session::has('primary'))
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('
        primary ') }}'
    })
    @endif
</script>
@endsection