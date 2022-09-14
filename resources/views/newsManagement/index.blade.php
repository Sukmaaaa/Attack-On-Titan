@extends('adminlte::page')

@section('title', 'News')
@section('dashboard_url', 'news')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
    <div class="row justify-content-between mx-1">
        <h1>News</h1>
        @if (auth()->user()->can('create-news'))
            <a href="{{ route('news.create') }}" class="btn bg-dark">Add News</a>
        @endif
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('notification.css') }}">
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

    $heads = ['No.', 'Image', 'Article', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    $i = 1;
    $newnewss = [];
    foreach ($news as $newss) {
        $btnEdit = auth()
            ->user()
            ->can('edit-news')
            ? '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('news.edit', $newss->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>'
            : '';
        $btnDelete = auth()
            ->user()
            ->can('delete-news')
            ? '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>'
            : '';
        $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('news.show', $newss->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
        $newnewss[] = [$i++, '<img src="'.$newss->image.'" width="40%">', $newss->article, '<form class="d-flex justify-content-center" onsubmit="return confirm"(\'Are you sure?\')" action="'.route('news.destroy', $newss->id).'" method="POST">' . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails . '</form>'];
    }

    $config = [
        'data' => $newnewss,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    @endphp

    <div class="card">
        <div class="card-header">
            News List
        </div>
        <div class="card-body">
            <x-adminlte-datatable with-buttons :config="$config" :heads="$heads" head-theme="dark" id="newsTable"
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

    pemberitahuan !== null && setTimeout(() => { pemberitahuan.style.display = 'none' }, 3000);
</script>
@endsection