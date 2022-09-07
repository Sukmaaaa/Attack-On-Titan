<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\episode;

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
        return view('episode.create');
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
            episode::create([
                'noInSeason' => $request->noInSeason,
                'titleCard' => $request->titleCard,
                'title' => $request->title,
                'directedBy' => $request->directedBy,
                'writenBy' => $request->writenBy,
                'originalAirDate' => $request->originalAirDate,
                'description' => $request->description
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
    public function show($id)
    {
        $episode = episode ::find($id);

        return view('episode.show', compact('episode'));
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

        return view('episode.edit', compact('episode'));
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

        $request->validate([
            'noInSeason' => 'required',
            'titleCard' => 'required',
            'title' => 'required',
            'directedBy' => 'required',
            'writenBy' => 'required',
            'originalAirDate' => 'required',
            'description' => 'required'
        ]);

        $episode->update($request->all());

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
