<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kyojin;

class kyojinController extends Controller
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
        $this->middleware('can:view-character');

        $kyojin = kyojin::all();
        

        return view('admin.kyojin.index')->with([
            'kyojin' => $kyojin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kyojin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('can:create-character');

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'species' => 'required',
            'gender' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'birthday' => 'required',
            'description' => 'required'
        ]);

        if (kyojin::where('name', '=', $request->name)->exists()) {
            return redirect()->route('kyojin.index')->with('alert', 'This data already exist.');
        } else {
            kyojin::create([
                'image' => $request->image,
                'name' => $request->name,
                'species' => $request->species,
                'gender' => $request->gender,
                'height' => $request->height,
                'weight' => $request->weight,
                'birthday' => $request->birthday,
                'description' => $request->description
            ]);

            return redirect()->route('kyojin.index')
                ->with('success', 'Character created successful.');
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
        $kyojin = kyojin::find($id);

        return view('admin.kyojin.show', compact('kyojin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('can:edit-character');

        $kyojin = kyojin::find($id);

        return view('admin.kyojin.edit', compact('kyojin'));
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
        $this->middleware('can:edit-character');

        $kyojin = kyojin::find($id);

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'species' => 'required',
            'gender' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'birthday' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();

        $kyojin->update($data);

        return redirect()->route('kyojin.index')
            ->with('primary', 'Character updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('can:delete-character');

        $kyojin = kyojin::find($id);
        $kyojin->delete();

        return redirect()->route('kyojin.index')
            ->with('danger', 'Character deleted successfully');
    }
}
