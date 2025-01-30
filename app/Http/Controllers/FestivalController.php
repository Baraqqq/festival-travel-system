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
}