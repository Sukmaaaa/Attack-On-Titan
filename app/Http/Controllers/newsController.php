<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class newsController extends Controller
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
    public function index(Request $request)
    {
        $news = news::all();

        return view('newsManagement.index')->with([
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('can:create-news');

        return view('newsManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('can:create-news');

        $request->validate([
            'image' => 'required',
            'article' => 'required'
        ]);

        if (news::where('image', '=', $request->image)->exists()) {
            return redirect()->route('news.index')->with('alert', 'This data already exist.');
        } else {
            news::create([
                'image' => $request->image,
                'article' => $request->article
            ]);

            return redirect()->route('news.index')
                ->with('success', 'data created successfully.');
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
        $news = news::find($id);

        return view('newsManagement.show')->with([
            'news' => $news
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
        $this->middleware('can:edit-news');

        $news = news::find($id);

        return view('newsManagement.edit', compact('news'));
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
        $this->middleware('can:edit-news');

        $news = news::find($id);

        $request->validate([
            'image' => 'required',
            'article' => 'required',
        ]);

        $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can:delete-news');

        $news = news::find($id);

        $news->delete();

        return redirect()->route('news.index')->with('success', 'data deleted successful.');
    }
}
