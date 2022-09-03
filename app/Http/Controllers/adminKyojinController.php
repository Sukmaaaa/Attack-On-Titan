<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
// use App\Models\admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class adminKyojinController extends Controller
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
    public function index(Request $request)
    {
        $this->middleware('can:view-users');
        // $admin = admin::all();
        $user = User::all();
        $role = Role::all();  
        // $roles = Role::all();
        // $data = Model::all();
        
        return view('kyojinAdmin.index')->with([
            // 'admin' => $admin,
            'user' => $user,
            'role' => $role
            // 'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $this->middleware('can:create-users');
        return view('kyojinAdmin.create')->with(['role' => $role]);
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
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        if (User::where('email', '=', $request->email)->exists()) {
            return redirect()->route('adminKyojin.index')->with('alert', 'This data already exist.');
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password)
            ]);

            $user->assignRole($request->role);

            return redirect()->route('adminKyojin.index')
                ->with('success', 'data created successfully.');
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
        $role = Role::find($id);
        $user = User::find($id);

        return view('kyojinAdmin.show')->with([
            'user' => $user,
            'role' => $role
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
        $this->middleware('can:edit-users');

        $user = User::find($id);
        // $admin = admin::find($id);
        $role = Role::all();
        
        return view('kyojinAdmin.edit', compact('user', 'role'));
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
        $this->middleware('can:edit-users');
        // $admin = admin::find($id);
        // $admin->Name = $request->Name;
        // $admin->email = $request->email;
        // $admin->password = $request->password;
        // $admin->syncRoles($request->role);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->syncRoles($request->role);

        // $creds = $request->only(['password']);
        // if (!Auth::attempt($creds)) return redirect()->route('adminKyojin.index')->with('alert', 'Password incorrect!');

        $user->save();


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        return redirect()->route('adminKyojin.index')->with('success', 'Updating Success');

        // NEW UPDATE
        // $user = User::find($id);
        // $role = Role::all();

        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'role' => 'required',
        //     'password' => 'required'
        // ]);

        // $data = $request->all();
        // $user->update($data);

        // $creds = $request->only(['email', 'password']);
        // if (!Auth::attempt($creds)) return redirect()->route('adminKyojin.index')->with('alert', 'Password incorrect!');

        // $user->update([
        //     'name' => $request->name,
        //     'password' => $request->new_password == null ? Hash::make($request->password) : Hash::make($request->new_password)
        // ]);

        // return redirect()->route('adminKyojin.index')
        //     ->with('success', 'data updated successfully.');
        // END NEW UPDATE
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can:delete-users');
        // $admin = admin::find($id);
        $user = User::find($id);
        $user->delete();
        // $admin->delete();

        return redirect()->route('adminKyojin.index')
            ->with('success', 'data deleted successfully');
    }
}
