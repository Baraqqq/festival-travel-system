@extends('layouts.app')

@section('content')
    <h1>Mijn Boekingen</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Festival</th>
                <th>Bus</th>
                <th>Ticket Nummer</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->bus->festival->naam }}</td>
                    <td>{{ $booking->bus->id }}</td>
                    <td>{{ $booking->ticket_nummer }}</td>
                    <td>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Annuleer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection