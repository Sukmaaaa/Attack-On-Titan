<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kyojin;
use App\Models\news;
use App\Models\Genre;
use App\Models\anime;
use App\Models\series;
use App\Models\episode;

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
        $kyojin = kyojin::all();
        $news = news::all();
        $genre = genre::all();
        $anime = anime::all();
        $series = series::all();
        $episode = episode::all();
        $user = user::all();

        // $kyojin = kyojin::find->max('$id');
        // $kyojin = kyojin::find($id);

        return view('home')->with([
            'roleName' => $getRoleName,
            'kyojin' => $kyojin,
            'news' => $news,
            'genre' => $genre,
            'anime' => $anime,
            'series' => $series,
            'episode' => $episode,
            'user' => $user,
        ]);
    }
}
