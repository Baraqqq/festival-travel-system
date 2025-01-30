@extends('layouts.app')

@section('content')
    <h1>{{ $festival->naam }}</h1>
    <p><strong>Locatie:</strong> {{ $festival->locatie }}</p>
    <p><strong>Genre:</strong> {{ $festival->genre }}</p>
    <p><strong>Datum:</strong> {{ $festival->datum }}</p>
    <p><strong>Beschrijving:</strong> {{ $festival->beschrijving }}</p>

    <h2>Beschikbare Busreizen</h2>
    <table>
        <thead>
            <tr>
                <th>Capaciteit</th>
                <th>Status</th>
                <th>Breng Tijd</th>
                <th>Ophaal Tijd</th>
                <th>Ophaal Punt</th>
                <th>Actie</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($festival->buses as $bus)
                <tr>
                    <td>{{ $bus->capaciteit }}</td>
                    <td>{{ $bus->status }}</td>
                    <td>{{ $bus->breng_tijd }}</td>
                    <td>{{ $bus->ophaal_tijd }}</td>
                    <td>{{ $bus->ophaal_punt }}</td>
                    <td>
                        @guest
                            <a href="{{ route('login') }}">Meld je aan</a>
                        @else
                            <a href="{{ route('bookings.create', ['bus_id' => $bus->id]) }}">Boek</a>
                        @endguest
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('festivals.index') }}">Terug naar festivals</a>
@endsection