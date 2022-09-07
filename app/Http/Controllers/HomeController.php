<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kyojin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $getRoleName = User::find(Auth::id())->getRoleNames()[0];

        // $kyojin = kyojin::find->max('$id');
        // $kyojin = kyojin::find($id);

        return view('home')->with([
            'roleName' => $getRoleName,
        ]);
    }
}
