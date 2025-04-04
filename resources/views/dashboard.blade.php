@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <h1>Dashboard</h1>
        <p>Welkom {{ Auth::user()->name }}!</p>
        
        <div class="card my-4 p-4 shadow">
            <h2>Mijn Festivalmuntjes</h2>
            <p>Je hebt {{ $points->amount ?? 0 }} muntjes</p>
            <a href="{{ route('my-points') }}" class="btn btn-primary">Bekijk Mijn Muntjes</a>
        </div>
        
        <div class="card my-4 p-4 shadow">
            <h2>Mijn Boekingen</h2>
            @if($recentBookings->isEmpty())
                <p>Je hebt nog geen boekingen gemaakt.</p>
            @else
                <ul>
                    @foreach($recentBookings as $booking)
                        <li>{{ $booking->bus->festival->naam }} - {{ $booking->created_at->format('d-m-Y') }}</li>
                    @endforeach
                </ul>
            @endif
            <a href="{{ route('bookings.index') }}" class="btn btn-primary">Bekijk Alle Boekingen</a>
        </div>
    </div>
@endsection