<?php
namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::where('user_id', auth()->id())->get();
        return view('points.index', compact('points'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer',
        ]);

        Point::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
        ]);

        return redirect()->route('points.index');
    }

    public function update(Request $request, Point $point)
    {
        $request->validate([
            'amount' => 'required|integer',
        ]);

        $point->update($request->all());
        return redirect()->route('points.index');
    }

    public function destroy(Point $point)
    {
        $point->delete();
        return redirect()->route('points.index');
    }
}