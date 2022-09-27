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
@endsection

@section('content')

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
        $newnewss[] = [$i++, '<img src="'.$newss->image.'" width="155">', $newss->article, '<form class="d-flex justify-content-center" onsubmit="return confirm"(\'Are you sure?\')" action="'.route('news.destroy', $newss->id).'" method="POST">' . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails . '</form>'];
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        })

    @if (Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success') }}'
            })
    @endif
    @if (Session::has('danger'))
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get('danger') }}'
            })
    @endif
    @if (Session::has('primary'))
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('primary') }}'
            })
    @endif


</script>
@endsection