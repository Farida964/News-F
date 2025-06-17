<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\View\View;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(): View
    {
        $allAgenda = Agenda::all();
        return view('agenda.index', compact('allAgenda'));
    }

    public function create()
    {
        return view('Agenda.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' =>'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        Agenda::create($validatedData);
        return redirect()->route('agenda.index');
    }

    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validatedData = $request->validate([
            'title' =>'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        $agenda->update($validatedData);
        return redirect()->route('agenda.index');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('agenda.index');
    }
}
