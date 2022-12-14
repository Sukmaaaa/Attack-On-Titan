<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
// use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class roleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        return view('roleManagement.index')->with(['role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roleManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        if (Role::where('name', '=', $request->name)->exists()) {
            return redirect()->route('role.index')->with('alert', 'This data already exist.');
        } else{
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo($request->permission);

        return redirect()->route('role.index')->with
        ('success', 'Role added successful');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $role = Role::find($id);
        
        // $getAllPermissions = $role->getAllPermissions()->all();

        // $permissions = [];

        // foreach($getAllPermissions as $permission){
        //     $permissions[] = $permission->name;
        // }

        // return view('roleManagement.show')->with([
        //     'role' => $role,
        //     'permission' => $permissions
        // ]);

        $role = Role::find($id);
        
        $getAllPermissions = $role->getAllPermissions()->all();

        $permissions = [];

        foreach($getAllPermissions as $permission){
            $permissions[] = $permission->name;
        }

        return view('roleManagement.show')->with([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        
        $getAllPermissions = $role->getAllPermissions()->all();

        $permissions = [];

        foreach($getAllPermissions as $permission){
            $permissions[] = $permission->name;
        }

        return view('roleManagement.edit')->with([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')->with
        ('primary', 'Role updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('role.index')->with('danger', 'Role deleted successful');
    }
}
