
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@extends('layouts.app')

@section('content')
    <section class="content">
        <h2>Bussen</h2>
        @auth
            @if(auth()->user()->role === 'planner' || auth()->user()->role === 'admin')
                <a href="{{ route('buses.create') }}">Add Bus</a>
            @endif
        @endauth
        <table>
            <thead>
                <tr>
                    <th>Festival</th>
                    <th>Capaciteit</th>
                    <th>Status</th>
                    <th>Breng Tijd</th>
                    <th>Ophaal Tijd</th>
                    <th>Ophaal Punt</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buses as $bus)
                    <tr>
                        <td>{{ $bus->festival->naam }}</td>
                        <td>{{ $bus->capaciteit }}</td>
                        <td>{{ $bus->status }}</td>
                        <td>{{ $bus->breng_tijd }}</td>
                        <td>{{ $bus->ophaal_tijd }}</td>
                        <td>{{ $bus->ophaal_punt }}</td>
                        <td>
                            <a href="{{ route('buses.show', $bus) }}">Bekijk</a>
                            @auth
                                @if(auth()->user()->role === 'planner' || auth()->user()->role === 'admin')
                                    <a href="{{ route('buses.edit', $bus) }}">Bewerken</a>
                                    <form action="{{ route('buses.destroy', $bus) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Verwijderen</button>
                                    </form>
                                @endif
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection