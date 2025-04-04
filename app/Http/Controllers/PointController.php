<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Booking;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        // Haal punten op of maak ze aan als ze niet bestaan
        $points = Point::firstOrCreate(
            ['user_id' => auth()->id()],
            ['amount' => 0]
        );
        
        // Haal de geschiedenis van boekingen op om te tonen hoe punten zijn verdiend
        $bookings = Booking::where('user_id', auth()->id())
                           ->orderBy('created_at', 'desc')
                           ->get();
        
        return view('points.index', compact('points', 'bookings'));
    }
    public function store(Request $request)
    {
        // Deze methode wordt gebruikt als je handmatig punten wilt toevoegen
        $request->validate([
            'amount' => 'required|integer|min:1'
        ]);

        $points = Point::firstOrCreate(['user_id' => auth()->id()]);
        $points->amount += $request->amount;
        $points->save();

        return redirect()->route('points.index')
                         ->with('success', $request->amount . ' muntjes zijn toegevoegd!');
    }

    public function update(Request $request, Point $point)
    {
        // Deze methode kun je gebruiken om het aantal punten bij te werken
        $request->validate([
            'amount' => 'required|integer|min:0'
        ]);

        if ($point->user_id !== auth()->id()) {
            return redirect()->route('points.index')
                             ->with('error', 'Je hebt geen toestemming om deze punten te bewerken.');
        }

        $point->amount = $request->amount;
        $point->save();

        return redirect()->route('points.index')
                         ->with('success', 'Muntjes bijgewerkt!');
    }

    public function destroy(Point $point)
    {
        // Deze methode kun je gebruiken om punten te verwijderen
        if ($point->user_id !== auth()->id()) {
            return redirect()->route('points.index')
                             ->with('error', 'Je hebt geen toestemming om deze punten te verwijderen.');
        }

        $point->delete();

        return redirect()->route('points.index')
                         ->with('success', 'Punten zijn verwijderd.');
    }

    // Extra methode om punten te verzilveren (optioneel)
    public function redeem(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:10|max:100'
        ]);
    
        $points = Point::firstOrCreate(['user_id' => auth()->id()], ['amount' => 0]);
        
        if ($points->amount < $request->amount) {
            return redirect()->route('points.index')
                            ->with('error', 'Je hebt niet genoeg muntjes om te verzilveren.');
        }
        
        // Verminder het aantal punten
        $points->amount -= $request->amount;
        $points->save();
        
        // Hier zou je een coupon kunnen genereren of een andere actie kunnen uitvoeren
        
        return redirect()->route('points.index')
                        ->with('success', 'Je hebt ' . $request->amount . ' muntjes verzilverd!');
    }
}