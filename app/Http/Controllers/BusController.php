<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::with('festival')->get();
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'festival_id' => 'required|exists:festivals,id',
            'capaciteit' => 'required|integer',
            'status' => 'required',
            'breng_tijd' => 'required|date_format:Y-m-d H:i:s',
            'ophaal_tijd' => 'required|date_format:Y-m-d H:i:s',
            'ophaal_punt' => 'required|string',
        ]);

        Bus::create($request->all());
        return redirect()->route('buses.index');
    }

    public function show(Bus $bus)
    {
        return view('buses.show', compact('bus'));
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'festival_id' => 'required|exists:festivals,id',
            'capaciteit' => 'required|integer',
            'status' => 'required',
            'breng_tijd' => 'required|date_format:Y-m-d H:i:s',
            'ophaal_tijd' => 'required|date_format:Y-m-d H:i:s',
            'ophaal_punt' => 'required|string',
        ]);

        $bus->update($request->all());
        return redirect()->route('buses.index');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index');
    }
}