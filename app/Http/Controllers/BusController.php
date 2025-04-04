<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Festival;
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
        // Haal alle festivals op om in de dropdown te tonen
        $festivals = Festival::all();
    
        // Geef de festivals door aan de view
        return view('buses.create', compact('festivals'));
    }
    public function store(Request $request)
    {
        \Log::info('Bus store aangeroepen', $request->all());
        
        // Input formatteren voordat validatie plaatsvindt
        $request->merge([
            'breng_tijd' => \Carbon\Carbon::parse($request->breng_tijd)->format('Y-m-d H:i:s'),
            'ophaal_tijd' => \Carbon\Carbon::parse($request->ophaal_tijd)->format('Y-m-d H:i:s'),
        ]);
        
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