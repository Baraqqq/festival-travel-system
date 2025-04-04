<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Haal punten op, als ze niet bestaan maak ze aan met 0 punten
        $points = Point::firstOrCreate(
            ['user_id' => $user->id],
            ['amount' => 0]
        );
        
        // Haal laatste boekingen op
        $recentBookings = Booking::where('user_id', $user->id)
                               ->orderBy('created_at', 'desc')
                               ->take(3)
                               ->get();
        
        return view('dashboard', compact('points', 'recentBookings'));
    }
}