<?php

namespace App\Http\Controllers;

use App\models\anime;
use Illuminate\Http\Request;
use App\models\animeHasSeries;

class animeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->middleware('can:view-anime');

        $anime = anime::all();

        return view('anime.index')->with([
            'anime' => $anime
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('can:create-anime');

        $request->validate([
            'cover' => 'required',
            'title' => 'required',
            'article' => 'required',
            'plot' => 'required',
            'production' => 'required',
        ]);

        if (anime::where('title', '=', $request->title)->exists()) {
            return redirect()->route('anime.index')->with('alert', 'This data already exist.');
        } else {
            anime::create([
                'cover' => $request->cover,
                'title' => $request->title,
                'article' => $request->article,
                'plot' => $request->plot,
                'production' => $request->production,
            ]);

            return redirect()->route('anime.index')
                ->with('success', 'Anime created successful.');
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
        $anime = anime::find($id);

        return view('anime.show')->with([
            'anime' => $anime
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
        $this->middleware('can-edit-anime');

        $anime = anime::find($id);

        return view('anime.edit')->with([
            'anime' => $anime
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
        $this->middleware('can-edit-anime');

        $anime = anime::find($id);

        $request->validate([
            'cover' => 'required',
            'title' => 'required',
            'article' => 'required',
            'plot' => 'required',
            'production' => 'required',
        ]);

        $anime->update($request->all());

        return redirect()->route('anime.index')->with('primary', 'Anime updated successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can-delete-anime');

        $anime = anime::find($id);
        $anime->delete();

        return redirect()->route('anime.index')
            ->with('danger', 'Anime deleted successfully');
    }
}
