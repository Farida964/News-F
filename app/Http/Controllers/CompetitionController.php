<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $allCompetition = Competition::all();
        return view('competition.index', compact('allCompetition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Competition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buat validasi
        $validatedData = $request->validate([
            'title' =>'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        //simpan data
        Competition::create( $validatedData);

        //redirect
        return redirect()->route('competition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        return view('competition.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competition = Competition::findOrFail($id);
        return view('competition.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        //buat validasi
        $validatedData = $request->validate([
            'title' =>'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        //simpan data
        $competition->update( $validatedData);

        //redirect
        return redirect()->route('competition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('competition.index');
    }
}
