@extends('adminlte::page')

@section('title', 'Characters')
@section('dashboard_url', 'admin')
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
    {{-- <link rel="stylesheet" href="{{ asset('notification.css') }}"> --}}
@endsection



@section('content')


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

    @php

    $heads = ['No.', 'Image', 'Name', 'Species', 'Gender', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    $i = 1;
    $newkyojins = [];
    foreach ($kyojin as $kyojins) {
        $btnEdit = auth()
            ->user()
            ->can('edit-character')
            ? '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('kyojin.edit', $kyojins->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>'
            : '';
        $btnDelete = auth()
            ->user()
            ->can('delete-character')
            ? '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>'
            : '';
        $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('kyojin.show', $kyojins->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
        $newkyojins[] = [$i++, '<img width="75" src="'.$kyojins->image.'">', $kyojins->name, $kyojins->species, $kyojins->gender, '<form class="d-flex justify-content-center" onsubmit="return confirm"(\'Yakin?\')" action="'.route('kyojin.destroy', $kyojins->id).'" method="POST">' . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails . '</form>'];
    }

    $config = [
        'data' => $newkyojins,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, null, ['orderable' => false]],
    ];
    @endphp

    <div class="card">
        <div class="card-header">
            Character List
        </div>
        <div class="card-body">
            <x-adminlte-datatable :config="$config" :heads="$heads" head-theme="dark" id="characterTable"
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

@endsection

@section('js')
<script>
    const thisAlert = document.getElementById('pemberitahuan1');

    thisAlert !== null && setTimeout(() => { thisAlert.style.display = 'none' }, 3000);
</script>
@endsection
