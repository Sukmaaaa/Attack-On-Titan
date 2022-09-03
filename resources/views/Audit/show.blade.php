@extends('adminlte::page')

@section('title', 'Audit detail') 
@section('dashboard_url', 'AuditLog')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)  

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>detail</h1></h1>
</div>
@endsection

@section('content') 

@php
    $audits = $Audit;
    $user = $audits->user_type;    
        @endphp
    
    <div class="card">
            <div class="card-header">
                Audit Log
            </div>

            <div class="card-body">

                <div class="row md-6">
                    <label class="col">User</label>
                    <label class="col">Event</label>
                </div>

                <div class="row md-6">
                    <div class="col">{{ $user::find($audits->user_id)->name }}</div>
                    <div class="col">{{ $Audit->event}}</div>
                </div>
                
                <div class="row md-6 mt-5">
                    <label class="col">Ip</label>
                    <label class="col">Url</label>
                </div>
                
                <div class="row md-6">
                    <div class="col">{{ $Audit->ip_address}}</div>
                    <div class="col">{{ $Audit->url}}</div>
                </div>

                <div class="row md-6 mt-5">
                    <label class="col">Old Value</label>
                    <label class="col">New Value</label>
                </div>

                <div class="row md-6 d-flex flex-wrap">
                    <div class="col-6">
                        @foreach($audits->old_values as $key => $value)
                        {{ $key .':' . $value;}} <br/>
                        @endforeach
                    </div>
                    <div class="col-6">
                        @foreach($audits->new_values as $key => $value)
                        {{ $key .':' . $value;}} <br/>
                        @endforeach
                    </div>
                </div>                

                {{-- <div class="row md-6">
                    <label class="col">New Value</label>
                </div> --}}

                {{-- <div class="col">
                    @foreach($audits->new_values as $key => $value)
                        {{ $key .':' . $value;}} <br/>
                        @endforeach
                </div> --}}
                
                <div class="row mt-5">
                    <label class="col">Created at</label>
                    <label class="col">Updated at</label>
                </div>
                
                <div class="row">
                    <div class="col">{{$Audit->created_at}}</div>
                    <div class="col">{{$Audit->updated_at}}</div>
                </div>

                <div class="container">  
                    <a href="{{ url()->previous() }}" class="btn btn-primary container mt-4">Back</a> 
                </div>
            </div>
        </div>

            
@endsection