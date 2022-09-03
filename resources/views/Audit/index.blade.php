@extends('adminlte::page')

@section('title', 'Audit')
@section('dashboard_url', 'AuditLog')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>AuditLog</h1>
</div>
@endsection

@section('content')
    @php
    $heads = ['No.', 'User', 'Event', 'Url', 'Created at', 'Updated at', ['label' => 'Actions', 'no-export' => true, 'width' => 5]];
    $i = 1;
    $newAudit = [];
    foreach ($Audit as $audits) {
        $user = $audits->user_type;

        $btnDetails = '<a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details" href="'.route('audit.show', $audits->id).'"><i class="fa fa-lg fa-fw fa-eye"></i></a>';
        $newAudit[] = [$i++, $user::find($audits->user_id)->name, $audits->event, $audits->url, $audits->created_at, $audits->updated_at, '<form class="d-flex justify-content-center">' . csrf_field()  . $btnDetails . '</form>'];
    }

    $config = [
        'data' => $newAudit,
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, null,  ['orderable' => false]],
    ];
    @endphp

    <div class="card">
        <div class="card-header">
            Audit Log
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