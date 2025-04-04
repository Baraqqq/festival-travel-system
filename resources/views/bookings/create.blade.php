@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Boeking Aanmaken</h1>
        
        <div class="card mb-3">
            <div class="card-header">Busreis Details</div>
            <div class="card-body">
                <p><strong>Festival:</strong> {{ $bus->festival->naam }}</p>
                
                {{-- Controleer en formatteer de datum correct --}}
                <p><strong>Datum:</strong> {{ is_string($bus->ophaal_tijd) ? date('d-m-Y', strtotime($bus->ophaal_tijd)) : $bus->ophaal_tijd->format('d-m-Y') }}</p>

                
                <p><strong>Vertrektijd:</strong> {{ is_string($bus->ophaal_tijd) ? date('H:i', strtotime($bus->ophaal_tijd)) : $bus->ophaal_tijd->format('H:i') }}</p>
                
                <p><strong>Ophaallocatie:</strong> {{ $bus->ophaal_punt }}</p>
            </div>
        </div>
        
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <input type="hidden" name="bus_id" value="{{ $bus->id }}">
            
            <div class="mb-3">
                <label for="ticket_nummer" class="form-label">Ticket Nummer</label>
                <input type="text" class="form-control" id="ticket_nummer" name="ticket_nummer" required>
                <div class="form-text">Vul het ticket nummer in dat je van het festival hebt ontvangen.</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Boeking Bevestigen</button>
        </form>
    </div>
@endsection