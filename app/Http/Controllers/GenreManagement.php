<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreManagement extends Controller
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
        $this->middleware('can:view-genre');

        $genres = Genre::all();

        return view('genreManagement.index')->with(['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genreManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('can:view-genre');

        $this->validate($request, [
            'name' => 'required',
            'definition' => 'required',
        ]);

        $genreName = preg_replace('/\s/', '-', $request->name);

        if (Genre::where('name', $genreName)->exists()) return redirect()->route('genre.index')->with(['alert' => 'Genre already exists!']);

        Genre::create($request->only('name', 'definition'));

        return redirect()->route('genre.index')->with(['success' => 'Genre successfully added!']);
    }

    public function show($id)
    {
        $genres = genre::find($id);

        return view('genreManagement.show')->with([
            'genre' => $genres
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
        $genre = Genre::find($id);

        return view('genreManagement.edit')->with(['genre' => $genre]);
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
        $this->middleware('can:view-genre');

        $genre = Genre::find($id);

        $this->validate($request, [
            'name' => 'required',
            'definition' => 'required'
        ]);

        $genre->update([
            'name' => preg_replace('/\s/', '-', $request->name),
        ]);

        return redirect()->route('genre.index')->with(['primary' => 'Genre successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can:view-genre');
        
        $genre = Genre::find($id);
        $genre->delete();

        return redirect()->route('genre.index')->with(['danger' => 'Genre successfully deleted!']);
    }
}
