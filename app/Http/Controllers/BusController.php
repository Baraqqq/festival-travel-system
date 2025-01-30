<?php
namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Festival;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('buses.index', compact('buses'));
    }

    public function create()
    {
        $festivals = Festival::all();
        return view('buses.create', compact('festivals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'festival_id' => 'required|exists:festivals,id',
            'capaciteit' => 'required|integer',
            'status' => 'required|string',
            'breng_tijd' => 'required',
            'ophaal_tijd' => 'required',
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
        $festivals = Festival::all();
        return view('buses.edit', compact('bus', 'festivals'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'festival_id' => 'required|exists:festivals,id',
            'capaciteit' => 'required|integer',
            'status' => 'required|string',
            'breng_tijd' => 'required',
            'ophaal_tijd' => 'required',
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