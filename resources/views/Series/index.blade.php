@extends('adminlte::page')

@section('title', 'Series')
@section('dashboard_url', 'Series')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>Series</h1>
    @if (auth()->user()->can('create-series'))
    <a href="{{ route('series.create') }}" class="btn bg-dark">Add Series</a>
    @endif
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('notification.css') }}">
@endsection

@section('content')

@php

$heads = ['No.', 'Cover', 'Title', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
$i = 1;
$newSeries = [];
foreach ($series as $series1) {
$btnEdit = auth()
->user()
->can('edit-series')
? '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('series.edit', $series1->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>'
: '';
$btnDelete = auth()
->user()
->can('delete-series')
? "<button class='btn btn-xs btn-default shadow mx-1' id='btnDelete' onclick='showDelete(".json_encode($series1->getOriginal()).", ".'"'.route('series.update', $series1->id).'"'.")' data-toggle='modal' data-target='#modalDelete' title='Delete'><i class='fa fa-lg fa-fw fa-trash text-danger'></i></button>"
: '';
$btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('series.show', $series1->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
$formActions = '<div class="d-flex justify-content-center">' . $btnEdit . ' ' . $btnDelete . ' ' . $btnDetails . '</div>';

$newSeries[] = [$i++, '<img src="'.$series1->cover.'" width="155px">', $series1->title, $formActions ];
}

$config = [
'data' => $newSeries,
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

<div class="card">
    <div class="card-header">
        Series List
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

<!-- MODAL DELETE SERIES -->
@if (count($series) >= 1)
<x-adminlte-modal id="modalDelete" title="Delete Series" theme="danger" icon="fas fa-newspaper" size='md' v-centered scrollable>
    <div class="temp">

        <x-slot name="footerSlot"></x-slot>
</x-adminlte-modal>
@endif
<!-- END MODAL DELETE SERIES -->
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    // NOTIF
    let pemberitahuan = document.getElementById('pemberitahuan1');

    pemberitahuan !== null && setTimeout(() => {
        pemberitahuan.style.display = 'none'
    }, 3000);
    // END NOTIF

    // MODAL BUTTON
    let btnDelete = document.getElementById("btnDelete");

    // MODAL
    const modalDelete = document.querySelector(
        "#modalDelete > div > div > div.modal-body"
    );

    let showDelete = (series, route) => {
        console.log(series)
        let content =
            `<form action="${route}" method="POST" class="d-flex flex-column justify-content-center align-items-center">{{ csrf_field() }}<input type="hidden" name="_method" value="DELETE"> <h4 class="font-weight-bold text-center">${series.title}</h4> <img class="img-fluid" src="${series.cover}" width="300"> <p>Are you sure?</p><x-adminlte-button label="Yes, delete!" theme="danger" class="w-100" type="submit"/></form>`;

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
    @if(Session::has('alert'))
    Toast.fire({
        icon: 'error',
        title: '{{ Session::get('
        alert ') }}'
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