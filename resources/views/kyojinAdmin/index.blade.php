@extends('adminlte::page')

@section('title', 'User')
@section('dashboard_url', 'admin')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
    <div class="row justify-content-between mx-1">
        <h1>User</h1>
        <a href="{{ route('adminKyojin.create') }}" class="btn bg-dark">Add User</a>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
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

    $heads = ['No.', 'Name', 'Email', 'Role', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    $i = 1;
    $newUser = [];
    foreach ($user as $users) {
        $btnEdit = '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('adminKyojin.edit', $users->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>';
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
        $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('adminKyojin.show', $users->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
            
        if ($users->id == 1) {
            $newUser[] = [$i++, $users->name,$users->email, $users->getRoleNames()[0], '<form class="d-flex justify-content-center">' . csrf_field()  . $btnDetails . '</form>'];
            } else{
                $newUser[] = [$i++, $users->name, $users->email, $users->getRoleNames()[0], '<form class="d-flex justify-content-center" onsubmit="return confirm"(\'Are you sure?\')" action="'.route('adminKyojin.destroy', $users->id).'" method="POST">' . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails . '</form>'];
            }
    }

    
    // $newAdmin = [];
    // foreach ($admin as $admins) {
    //     $btnEdit = '<a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" href="'.route('adminKyojin.edit', $admins->id).'"><i class="fa fa-lg fa-fw fa-pen"></i></a>';
    //     $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" type="submit"><i class="fa fa-lg fa-fw fa-trash"></i></button>';
    //     $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('adminKyojin.show', $admins->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
    //     $newAdmin[] = [$i++, $admins->Name, $admins->email, $admins->role, '<form class="d-flex justify-content-center" onsubmit="return confirm"(\'Are you sure?\')" action="'.route('news.destroy', $newss->id).'" . csrf_field() . '<input type="hidden" name="_method" value="delete" />' . $btnEdit . $btnDelete . $btnDetails . '</form>'];
    // }
    


    $config = [
        'data' => $newUser,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
    @endphp

    <div class="card">
        <div class="card-header">
            User List
        </div>
        <div class="card-body">
            <x-adminlte-datatable with-buttons :config="$config" :heads="$heads" head-theme="dark" id="adminTable"
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
