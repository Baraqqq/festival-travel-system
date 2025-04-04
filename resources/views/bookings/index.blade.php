@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn Boekingen</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if ($bookings->isEmpty())
            <div class="alert alert-info">
                Je hebt nog geen boekingen.
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Festival</th>
                        <th>Datum</th>
                        <th>Vertrektijd</th>
                        <th>Ticket Nummer</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->bus->festival->naam }}</td>
                            <td>{{ $booking->bus->ophaal_tijd->format('d-m-Y') }}</td>
                            <td>{{ $booking->bus->ophaal_tijd->format('H:i') }}</td>
                            <td>{{ $booking->ticket_nummer }}</td>
                            <td>
                                <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Annuleren</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection