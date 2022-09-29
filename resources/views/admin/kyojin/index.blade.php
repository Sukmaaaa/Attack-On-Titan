@extends('adminlte::page')

@section('title', 'Character')
@section('dashboard_url', 'Character')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>Character</h1>
    @if (auth()->user()->can('create-character'))
    <a href="{{ route('kyojin.create') }}" class="btn bg-dark">Add Character</a>
    @endif
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('notification.css') }}">
@endsection

@section('content')

@php

$heads = ['No.', 'Image', 'Name', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
$i = 1;
$newKyojins = [];
foreach ($kyojin as $kyojins) {
$btnEdit = auth()
->user()
->can('edit-character')
? '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('kyojin.edit', $kyojins->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>'
: '';
$btnDelete = auth()
->user()
->can('delete-character')
? "<button class='btn btn-xs btn-default shadow mx-1' id='btnDelete' onclick='showDelete(".json_encode($kyojins->getOriginal()).", ".'"'.route('kyojin.update', $kyojins->id).'"'.")' data-toggle='modal' data-target='#modalDelete' title='Delete'><i class='fa fa-lg fa-fw fa-trash text-danger'></i></button>"
: '';
$btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('kyojin.show', $kyojins->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
$formActions = '<div class="d-flex justify-content-center">' . $btnEdit . ' ' . $btnDelete . ' ' . $btnDetails . '</div>';

$newKyojins[] = [$i++, '<img src="'.$kyojins->image.'" width="155px">', $kyojins->name, $formActions ];
}

$config = [
'data' => $newKyojins,
'order' => [[1, 'asc']],
'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

<div class="card">
    <div class="card-header">
        Character List
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

<!-- MODAL DELETE CHARACTER -->
@if (count($kyojin) >= 1)
<x-adminlte-modal id="modalDelete" title="Delete Character" theme="danger" icon="fas fa-newspaper" size='md' v-centered scrollable>
    <div class="temp">

        <x-slot name="footerSlot"></x-slot>
</x-adminlte-modal>
@endif
<!-- END MODAL DELETE CHARACTER -->
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

    let showDelete = (kyojin, route) => {
        console.log(kyojin)
        let content =
            `<form action="${route}" method="POST" class="d-flex flex-column justify-content-center align-items-center">{{ csrf_field() }}<input type="hidden" name="_method" value="DELETE"> <h4 class="font-weight-bold text-center">${kyojin.name}</h4> <img class="img-fluid" src="${kyojin.image}" width="300"> <p>Are you sure?</p><x-adminlte-button label="Yes, delete!" theme="danger" class="w-100" type="submit"/></form>`;

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