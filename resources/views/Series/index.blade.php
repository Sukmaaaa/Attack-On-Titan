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
<!-- NOTIF -->
@if ($message = Session::get('alert'))
        <x-adminlte-alert theme="warning" title-class="text-danger text-uppercase"
    icon="fas fa-exclamation-triangle" title="Warning" dismissable id="pemberitahuan1">
            {{ $message }}
        </x-adminlte-alert>
    @endif
    @if ($message = Session::get('success'))
    <x-adminlte-alert theme="success" title-class="text-danger text-uppercase"
    icon="fas fas fa-thumbs-up" title="Success" dismissable id="pemberitahuan1">
            {{ $message }}
        </x-adminlte-alert>
    @endif
    @if ($message = Session::get('primary'))
    <x-adminlte-alert theme="primary" title-class="text-danger text-uppercase"
    icon="fas fa-info-circle" title="Info" dismissable id="pemberitahuan1">
            {{ $message }}
        </x-adminlte-alert>
    @endif
    @if ($message = Session::get('danger'))
    <x-adminlte-alert theme="danger" title-class="text-danger text-uppercase"
    icon="fas fa-lg fa-exclamation-circle" title="Danger" dismissable id="pemberitahuan1">
            {{ $message }}
        </x-adminlte-alert>
    @endif
<!-- END NOTIF -->

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
            ? "<button class='btn btn-outline-danger btn-sm mx-1' id='btnDelete' onclick='showDelete(".json_encode($series1->getOriginal()).", ".'"'.route('series.update', $series1->id).'"'.")' data-toggle='modal' data-target='#modalDelete' title='Delete'><i class='fa fa-lg fa-trash'></i></button>"
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
            <x-adminlte-datatable :config="$config" :heads="$heads" head-theme="dark" id="newsTable"
                theme="light" hoverable bordered beautify>
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
        <x-adminlte-modal id="modalDelete" title="Delete Series" theme="danger" icon="fas fa-newspaper" size='md'
            v-centered scrollable>
            <div class="temp"> 
                
            <x-slot name="footerSlot"></x-slot>
        </x-adminlte-modal>
    @endif
    <!-- END MODAL DELETE SERIES -->
@endsection

@section('js')
<script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    // NOTIF
    let pemberitahuan = document.getElementById('pemberitahuan1');

    pemberitahuan !== null && setTimeout(() => { pemberitahuan.style.display = 'none' }, 3000);
    // END NOTIF

    // MODAL BUTTON
    let btnDelete = document.getElementById("btnDelete");

    // MODAL
    const modalDelete = document.querySelector(
            "#modalDelete > div > div > div.modal-body"
    );

    let showDelete = (series, route) =>{
        console.log(series)
        let content =
                `<form action="${route}" method="POST" class="d-flex flex-column justify-content-center align-items-center">{{ csrf_field() }}<input type="hidden" name="_method" value="DELETE"> <h4 class="font-weight-bold text-center">${series.title}</h4> <img class="img-fluid" src="${series.cover}" width="300"> <p>Are you sure?</p><x-adminlte-button label="Yes, delete!" theme="danger" class="w-100" type="submit"/></form>`;

            return (modalDelete.innerHTML = content);
    }
</script>
@endsection