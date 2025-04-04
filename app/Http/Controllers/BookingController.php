<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Festival;
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
        if (!$request->has('bus_id')) {
            return redirect()->route('buses.index')->with('error', 'Selecteer eerst een bus om te boeken');
        }
    
        $bus = Bus::findOrFail($request->bus_id);
        
        // Debug informatie
        \Log::info('Bus opgehaald', [
            'bus_id' => $bus->id,
            'ophaal_tijd_type' => gettype($bus->ophaal_tijd),
            'ophaal_tijd' => $bus->ophaal_tijd,
        ]);
    
        return view('bookings.create', compact('bus'));
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'bus_id' => 'required|exists:buses,id',
                'ticket_nummer' => 'required|string',
            ]);
    
            \Log::info('Validatie geslaagd', $request->all());
    
            $booking = Booking::create([
                'user_id' => auth()->id(),
                'bus_id' => $request->bus_id,
                'ticket_nummer' => $request->ticket_nummer,
            ]);
    
            \Log::info('Booking aangemaakt', ['booking_id' => $booking->id]);
    
            // Voeg punten toe aan de gebruiker
            $points = Point::firstOrCreate(['user_id' => auth()->id()], ['amount' => 0]);
            $pointsToAdd = 5; // 5 punten per boeking
            $points->amount += $pointsToAdd;
            $points->save();
    
            \Log::info('Punten toegevoegd', [
                'user_id' => auth()->id(),
                'points_added' => $pointsToAdd,
                'total_points' => $points->amount
            ]);
    
            return redirect()->route('bookings.index')
                             ->with('success', 'Je boeking is succesvol aangemaakt! Je hebt ' . $pointsToAdd . ' festivalmuntjes verdiend.');
        } catch (\Exception $e) {
            \Log::error('Fout bij het aanmaken van een boeking', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
    
            return redirect()->back()
                             ->with('error', 'Er is een fout opgetreden bij het aanmaken van je boeking.');
        }
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'bus_id' => 'required|exists:buses,id',
    //         'ticket_nummer' => 'required|string',
    //     ]);

    //     Booking::create([
    //         'user_id' => auth()->id(),
    //         'bus_id' => $request->bus_id,
    //         'ticket_nummer' => $request->ticket_nummer,
    //     ]);

    //     // Voeg punten toe aan de gebruiker
    //     $points = Point::firstOrCreate(['user_id' => auth()->id()]);
    //     $points->amount += 5; // Voeg 5 punten toe
    //     $points->save();

    //     return redirect()->route('bookings.index')->with('success', 'U bent aangemeld voor de busreis. U hebt 5 muntjes gewonnen voor drank en eten op uw volgende festival.');
    // }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }
}