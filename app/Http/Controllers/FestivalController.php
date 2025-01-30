<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function index()
    {
        $festivals = Festival::all();
        return view('festivals.index', compact('festivals'));
    }

    public function create()
    {
        return view('festivals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'locatie' => 'required',
            'genre' => 'required',
            'datum' => 'required|date',
            'beschrijving' => 'nullable',
        ]);

        Festival::create($request->all());
        return redirect()->route('festivals.index');
    }

    public function show(Festival $festival)
    {
        return view('festivals.show', compact('festival'));
    }

    public function edit(Festival $festival)
    {
        return view('festivals.edit', compact('festival'));
    }

    public function update(Request $request, Festival $festival)
    {
        $request->validate([
            'naam' => 'required',
            'locatie' => 'required',
            'genre' => 'required',
            'datum' => 'required|date',
            'beschrijving' => 'nullable',
        ]);

        $festival->update($request->all());
        return redirect()->route('festivals.index');
    }

    public function destroy(Festival $festival)
    {
        $festival->delete();
        return redirect()->route('festivals.index');
    }
}