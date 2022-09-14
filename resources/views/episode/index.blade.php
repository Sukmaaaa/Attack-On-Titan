@extends('adminlte::page')

@section('title', 'Episode')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
    <div class="row justify-content-between mx-1">
        <h1>Episode</h1>
        <a href="{{ route('episode.create') }}" class="btn bg-dark">Add Episode</a>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="pemberitahuan1">
            <p class="notif-create">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('primary'))
        <div class="alert alert-primary" id="pemberitahuan1">
            <p class="notif-create">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger" id="pemberitahuan1">
            <p class="notif-create">{{ $message }}</p>
        </div>
    @endif


    @php
        
        $heads = [['label' => 'No.', 'width' => 5], 'Title Card', "Title", ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
        $i = 1;
        $newEpisodes = [];
        foreach ($episode as $episodes) {
        $btnEdit = auth()
            ->user()
            ->can('edit-episode')
            ? '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('episode.edit', $episodes->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>'
            : '';
        $btnDelete = auth()
            ->user()
            ->can('delete-episode')
            ? '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>'
            : '';
        $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('episode.show', $episodes->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
        $newEpisodes[] = [$i++, '<img width="75" src="'.$episodes->titleCard.'">', $episodes->title, '<form class="d-flex justify-content-center" onsubmit="return confirm"(\'Yakin?\')" action="'.route('episode.destroy', $episodes->id).'" method="POST">' . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails . '</form>'];
    }
        
        $config = [
            'data' => $newEpisodes,
            'order' => [[1, 'asc']],
            'columns' => [null, null, null, ['orderable' => false]],
        ];
    @endphp

    <div class="card">
        <div class="card-header">
            Episode List
        </div>
        <div class="card-body">
            <x-adminlte-datatable with-buttons :config="$config" :heads="$heads" head-theme="dark" id="episodeTable"
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
        const pemberitahuan = document.getElementById('pemberitahuan1');

        pemberitahuan !== null && setTimeout(() => {
            pemberitahuan.style.display = 'none'
        }, 3000);
    </script>
@endsection
