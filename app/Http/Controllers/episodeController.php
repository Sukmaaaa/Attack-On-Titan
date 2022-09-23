<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\episode;
use App\Models\Series;
use App\Models\seriesHasEpisode;

class episodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->middleware('can-view-episode');

        $episode = episode::all();

        return view('episode.index')->with([
            'episode' => $episode
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series = series::all();
        

        return view('episode.create')->with([
            'series' => $series
        ]);
    }   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description'
        $this->middleware('can-create-episode');

        $request->validate([
            'noInSeason' => 'required',
            'series' => 'required',
            'titleCard' => 'required',
            'title' => 'required',
            'directedBy' => 'required',
            'writenBy' => 'required',
            'originalAirDate' => 'required',
            'description' => 'required'
        ]);

        if (episode::where('title', '=', $request->title)->exists()) {
            return redirect()->route('episode.index')->with('alert', 'This episode already exist.');
        } else {
           $episode = episode::create([
                'noInSeason' => $request->noInSeason,
                'titleCard' => $request->titleCard,
                'title' => $request->title,
                'directedBy' => $request->directedBy,
                'writenBy' => $request->writenBy,
                'originalAirDate' => $request->originalAirDate,
                'description' => $request->description
            ]);
            
            seriesHasEpisode::create([
                'series_id' => $request->series,
                'episode_id' => $episode->id
            ]);

            return redirect()->route('episode.index')
                ->with('success', 'Episode created successful.');
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $episode = episode::find($id);
        $seriesHasEpisode = seriesHasEpisode::where('episode_id', $id)->get()->first();

        return view('episode.show')->with([
            'episode' => $episode,
            'seriesHasEpisode'=>series::find($seriesHasEpisode->series_id)
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
        $this->middleware('can-edit-episode');

        $episode = episode::find($id);
        $series = series::all();

        return view('episode.edit')->with([
            'episode' => $episode,
            'series' => $series
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
         // 'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description'
        $this->middleware('can:edit-episode');

        $episode = episode::find($id);

        $seriesHasEpisode = seriesHasEpisode::where('episode_id', $id);

        $request->validate([
            'noInSeason' => 'required',
            'series' => 'required',
            'titleCard' => 'required',
            'title' => 'required',
            'directedBy' => 'required',
            'writenBy' => 'required',
            'originalAirDate' => 'required',
            'description' => 'required'
        ]);

        $seriesHasEpisode2 = series::find($request->series);

        $episode->update([
            'noInSeason' => $request->noInSeason,
                'titleCard' => $request->titleCard,
                'title' => $request->title,
                'directedBy' => $request->directedBy,
                'writenBy' => $request->writenBy,
                'originalAirDate' => $request->originalAirDate,
                'description' => $request->description
        ]);

        $seriesHasEpisode->delete();

        seriesHasEpisode::create([
            'episode_id' => $id,
            'series_id'=>$request->series
        ]);

        return redirect()->route('episode.index')
            ->with('primary', 'Episode updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can:delete-episode');

        $episode = episode::find($id);
        $episode->delete();

        return redirect()->route('episode.index')
            ->with('danger', 'Episode deleted successful');
    }
}
