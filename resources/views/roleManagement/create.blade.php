@extends('adminlte::page')
@section('title', 'Add Role')

@section('content_header')
    <h1>Add Role</h1>
@endsection

@section('content')
    @if (Session::has('alert'))
        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
    @endif

    <form action="{{ route('role.store') }}" method="POST" class="container">
        @csrf
     
        <x-adminlte-input type="text" name="name" label="Name:" placeholder="admin">
        </x-adminlte-input>

        <div class="row">
            <!-- <x-adminlte-input type="text" name="email" label="Email:" placeholder="Admin@kyojin.com" fgroup-class="col-md-6">
                </x-adminlte-input> -->
                <label>Permission :</label><br>
        <!-- <div class="icheck-primary">
        <input type="checkbox" id="someCheckboxId" />
    <label for="someCheckboxId">Click to check</label>
</div> -->
        </div>

        <div class="row">
        <label class="col">Character :</label>
        <label class="col">News :</label>
        <label class="col">Role :</label>
        <label class="col">User Management :</label>
        </div>

        <!-- VIEW PERMISSION -->
        <div class="row">
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-character"/>
                 <label for="someCheckboxId">View Character</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-news"/>
                 <label for="someCheckboxId">View News</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-roles"/>
                 <label for="someCheckboxId">View Role</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" />
                 <label for="someCheckboxId">View User Management</label>
            </div>
        </div>
        <!-- END VIEW PERMISSION -->

        <!-- EDIT PERMISSION -->
        <div class="row">
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-character"/>
                 <label for="someCheckboxId">Edit Character</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-news"/>
                 <label for="someCheckboxId">Edit News</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-roles"/>
                 <label for="someCheckboxId">Edit Role</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" />
                 <label for="someCheckboxId">Edit User Management</label>
            </div>
        </div>
        <!-- END EDIT PERMISSION -->

        <!-- DELETE PERMISSION -->
        <div class="row">
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="delete-character"/>
                 <label for="someCheckboxId">Delete Character</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="delete-news"/>
                 <label for="someCheckboxId">Delete News</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="delete-roles"/>
                 <label for="someCheckboxId">Delete Role</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" />
                 <label for="someCheckboxId">Delete User Management</label>
            </div>
        </div>
        <!-- END DELETE PERMISSION -->
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Add Role" type="submit"></x-adminlte-button>
        </div>

</form>
@endsection