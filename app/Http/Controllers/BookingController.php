<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Point;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $bus = Bus::findOrFail($request->bus_id);
        return view('bookings.create', compact('bus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'ticket_nummer' => 'required|string',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'bus_id' => $request->bus_id,
            'ticket_nummer' => $request->ticket_nummer,
        ]);

        // Voeg punten toe aan de gebruiker
        $points = Point::firstOrCreate(['user_id' => auth()->id()]);
        $points->amount += 5; // Voeg 5 punten toe
        $points->save();

        return redirect()->route('bookings.index')->with('success', 'U bent aangemeld voor de busreis. U hebt 5 muntjes gewonnen voor drank en eten op uw volgende festival.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}