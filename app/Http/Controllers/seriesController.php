<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\episode;
use App\Models\SeriesHasGenres;
use App\Models\seriesHasEpisode;

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
            $series = series::create([
                'cover' => $request->cover,
                'trailer' => $request->trailer,
                'title' => $request->title,
                'article' => $request->article,
                'countryOfOrigin' => $request->countryOfOrigin,
                'originalRelease' => $request->originalRelease
            ]);

            foreach ($request->genre as $key => $value) {
                SeriesHasGenres::create([
                    'series_id' => $series->id,
                    'genre_id' => $value
                ]);
            }

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
        $seriesHasGenre = SeriesHasGenres::where('series_id', $id)->get()->all();
        $genreId = [];
        $genres = [];
        $episodes = seriesHasEpisode::where('series_id', $id)->get()->all();

        foreach($seriesHasGenre as $genre) {
            $genres[] = Genre::find($genre->genre_id)->name;
        }
        
        return view('Series.show')->with([
            'episodes' => $episodes,
            'genreName' => $genres,
            'series' => $series,
            'genreId' => $genreId,
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
        $this->middleware('can:edit-series');

        $series = series::find($id);
        $seriesHasGenre = SeriesHasGenres::where('series_id', $id)->get()->all();
        $genreId = [];

        foreach($seriesHasGenre as $genre) {
            $genreId[] = $genre->genre_id;
        }
        
        return view('Series.edit')->with([
            'genres' => Genre::all(),
            'series' => $series,
            'genreId' => $genreId,
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

        $series->update([
            'cover' => $request->cover,
                'trailer' => $request->trailer,
                'title' => $request->title,
                'article' => $request->article,
                'countryOfOrigin' => $request->countryOfOrigin,
                'originalRelease' => $request->originalRelease
        ]);

        $seriesHasGenres = SeriesHasGenres::where('series_id', $id)->get()->all();

        foreach ($seriesHasGenres as $key => $value) {
            SeriesHasGenres::where('genre_id', $value->genre_id)->delete();
        }

        foreach ($request->genre as $key => $value) {
            SeriesHasGenres::create([
                'series_id' => $id,
                'genre_id' => $value
            ]);
        }

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
