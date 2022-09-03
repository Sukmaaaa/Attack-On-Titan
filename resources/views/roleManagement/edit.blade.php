@extends('adminlte::page')
@section('title', 'Edit News')

@section('content_header')
    <h1>Edit News</h1>
@endsection

@section('content')
    <form action="{{ route('role.update', $role->id) }}" method="POST" class="container">
        @csrf
        @method('PUT')

        <x-adminlte-input type="text" name="name" label="Name:" placeholder="admin" value="{{ old('name', $role->name) }}">
        </x-adminlte-input>

        <div class="row">
                <label>Permission :</label><br>
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
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-character" {{ in_array('view-character', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">View Character</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-news" {{ in_array('view-news', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">View News</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-roles" {{ in_array('view-roles', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">View Role</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="view-users" {{ in_array('view-users', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">View User Management</label>
            </div>
        </div>
        <!-- END VIEW PERMISSION -->

        <!-- EDIT PERMISSION -->
        <div class="row">
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-character" {{ in_array('edit-character', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Edit Character</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-news"{{ in_array('edit-news', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Edit News</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-roles" {{ in_array('edit-roles', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Edit Role</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="edit-users" {{ in_array('edit-users', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Edit User Management</label>
            </div>
        </div>
        <!-- END EDIT PERMISSION -->

        <!-- DELETE PERMISSION -->
        <div class="row">
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="delete-character" {{ in_array('delete-character', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Delete Character</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="delete-news" {{ in_array('delete-news', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Delete News</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" name="permission[]" value="delete-roles" {{ in_array('delete-roles', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Delete Role</label>
            </div>
            <div class="col icheck-primary">
                <input type="checkbox" id="someCheckboxId" value="delete-users" {{ in_array('delete-users', $permissions) ? 'checked' : '' }}/>
                 <label for="someCheckboxId">Delete User Management</label>
            </div>
        </div>
        <!-- END DELETE PERMISSION -->
        <div class="d-flex flex-row justify-content-between">
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            <x-adminlte-button class="btn bg-dark" label="Update Role" type="submit"></x-adminlte-button>
        </div>

</form>
@endsection