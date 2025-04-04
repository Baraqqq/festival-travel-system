@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <h1>Mijn Festivalmuntjes</h1>
        
        <div class="card my-4 p-4 shadow">
            <h2>Totaal Aantal Muntjes</h2>
            <p>Je hebt {{ $points->amount ?? 0 }} muntjes</p>
        </div>
        
        <div class="card my-4 p-4 shadow">
            <h2>Hoe Ik Muntjes Heb Verdiend</h2>
            @if($bookings->isEmpty())
                <p>Je hebt nog geen busreizen geboekt en daarmee nog geen muntjes verdiend.</p>
            @else
                <ul>
                    @foreach($bookings as $booking)
                        <li>{{ $booking->bus->festival->naam }} - {{ $booking->created_at->format('d-m-Y') }} - +5 muntjes</li>
                    @endforeach
                </ul>
            @endif
        </div>
        
        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Terug naar Dashboard</a>
        </div>
    </div>
@endsection