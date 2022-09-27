<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;
use App\Models\kyojin;
use App\Models\episode;
use App\Models\Genre;
use App\Models\SeriesHasGenres;
use App\Models\seriesHasEpisode;
use App\Models\Series;


class shingekiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $series = series::all();
        $news = news::all();
        $kyojin = kyojin::all();

        $shareComponent = \Share::page(
            'http://attack-on-titan.test/attack',
            'Visit Attack on Titan Wiki',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()        
        ->reddit();

        return view('shingeki.index')->with([
            'news' => $news,
            'series'=> $series,
            'kyojin' => $kyojin,
            'shareComponent' => $shareComponent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $Episode = episode::class;

         // get previous user id
        $previous = series::where('id', '<', $series->id)->max('id');

        // get next user id
        $next = series::where('id', '>', $series->id)->min('id');

        foreach($seriesHasGenre as $genre) {
            $genres[] = Genre::find($genre->genre_id)->name;
        }
        
        return view('shingeki.show')->with([
            'genreName' => $genres,
            'series' => $series,
            'episodes' => $episodes,
            'genreId' => $genreId,
            'serieshehe' => series::all(),
            'previous' => $previous,
            'next' => $next,
            'Episode' => $Episode,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
