<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Series;

class seriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->middleware('can:view-series');

        $series = series::all();

        return view('Series.index')->with([
            'series' => $series
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create')->with(['genres' => Genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('can-create-series');
        // 'cover', 'trailer', 'title', 'series' , 'article',  'countryOfOrigin', 'originalNetwork', 'originalRelease'
        $request->validate([
            'cover' => 'required',
            'trailer' => 'required',
            'title' => 'required',
            'genre' => 'required',
            'article' => 'required',
            'countryOfOrigin' => 'required',
            'originalRelease' => 'required'
        ]);

        if (series::where('title', '=', $request->title)->exists()) {
            return redirect()->route('series.index')->with('alert', 'This data already exist.');
        } else {
            series::create([
                'cover' => $request->cover,
                'trailer' => $request->trailer,
                'title' => $request->title,
                'genre' => $request->genre,
                'article' => $request->article,
                'countryOfOrigin' => $request->countryOfOrigin,
                'originalRelease' => $request->originalRelease
            ]);

            return redirect()->route('series.index')
                ->with('success', 'data created successful.');
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
        $series = series::find($id);

        return view('Series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('can:edit-series');

        $series = series::find($id);

        return view('Series.edit', compact('series'));
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
        $this->middleware('can:edit-series');

        $series = series::find($id);

        $request->validate([
            'cover' => 'required',
            'trailer' => 'required',
            'title' => 'required',
            'genre' => 'required',
            'article' => 'required',
            'countryOfOrigin' => 'required',
            'originalRelease' => 'required'
        ]);

        $series->update($request->all());

        return redirect()->route('series.index')
            ->with('primary', 'data updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can:delete-series');

        $series = series::find($id);
        $series->delete();

        return redirect()->route('series.index')
            ->with('danger', 'Series deleted successful');
    }
}
