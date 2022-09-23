@extends('adminlte::page')

@section('title', 'Audit detail') 
@section('dashboard_url', 'Character')
@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true)  

@section('content_header')
<div class="row justify-content-between mx-1">
    <h1>detail</h1></h1>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <label>Role detail</label>
    </div>

    <div class="card-body">

        <div class="row md-6">
            <label>{{ $role->name }}</label>
            
        </div> 

                <!-- VIEW PERMISSION PART 1 -->
                <div class="row">
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="view-character" onclick="return false;" {{ in_array('view-character', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">View Character</label>
                    </div>
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="view-news" {{ in_array('view-news', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">View News</label>
                    </div>
                </div>
                {{-- END VIEW PERMISSION PART 1 --}}

                {{-- EDIT PERMISSION PART 1 --}}
                <div class="row">
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="edit-character" {{ in_array('edit-character', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">Edit Character</label>
                    </div>
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="edit-news"{{ in_array('edit-news', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">Edit News</label>
                    </div>
                </div>
                {{-- END EDIT PERMISSION PART 1 --}}

                {{-- DELETE PERMISSION PART 1 --}}
                <div class="row">
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="delete-character" {{ in_array('delete-character', $permissions) ? 'checked' : '' }}/>
                        <label for="someCheckboxId">Delete Character</label>
                    </div>
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="delete-news" {{ in_array('delete-news', $permissions) ? 'checked' : '' }}/>
                        <label for="someCheckboxId">Delete News</label>
                    </div>
                </div>
                {{-- END DELETE PERMISSION PART 1 --}}


                {{-- VIEW PERMISSION PART 2 --}}
                <div class="row mt-3">
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="view-roles" {{ in_array('view-roles', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">View Role</label>
                    </div>
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="view-users" {{ in_array('view-users', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">View User Management</label>
                    </div>
                </div>
                <!-- END VIEW PERMISSION PART 2 -->
        
                <!-- EDIT PERMISSION PART 2-->
                <div class="row">
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="edit-roles" {{ in_array('edit-roles', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">Edit Role</label>
                    </div>
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="edit-users" {{ in_array('edit-users', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">Edit User Management</label>
                    </div>
                </div>
                <!-- END EDIT PERMISSION PART 2 -->
        
                <!-- DELETE PERMISSION PART 2 -->
                <div class="row">
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="delete-roles" {{ in_array('delete-roles', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">Delete Role</label>
                    </div>
                    <div class="col icheck-primary">
                        <input type="checkbox" id="someCheckboxId" name="permission[]" onclick="return false;" value="delete-users" {{ in_array('delete-users', $permissions) ? 'checked' : '' }}/>
                         <label for="someCheckboxId">Delete User Management</label>
                    </div>
                </div>
                <!-- END DELETE PERMISSION PART2 -->

            <div class="row">  
                <a href="{{ url()->previous() }}" class="btn btn-primary mt-4 col-md-12">Back</a> 
            </div>
    </div>
</div>
@endsection