<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::id());

        return view('profile.index')->with(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'new_password'
        ]);

        $creds = $request->only(['email', 'password']);

        if (!Auth::attempt($creds)) return redirect()->route('profile.index')->with('alert', 'Password incorrect!');

        $user->update([
            'name' => $request->name,
            'password' => $request->new_password == null ? Hash::make($request->password) : Hash::make($request->new_password)
        ]);

        return redirect()->route('kyojin.index');
    }
}
