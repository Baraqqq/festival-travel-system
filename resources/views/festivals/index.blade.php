@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    <section class="content">
        <h2>Beschikbare Festivals</h2>
        @auth
        @if(auth()->user()->role === 'planner' || auth()->user()->role === 'admin')
            <a href="{{ route('festivals.create') }}">Festival Toevoegen</a>
        @endif
    @endauth
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Locatie</th>
                    <th>Genre</th>
                    <th>Datum</th>
                    <th>Beschrijving</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($festivals as $festival)
                    <tr>
                        <td>{{ $festival->naam }}</td>
                        <td>{{ $festival->locatie }}</td>
                        <td>{{ $festival->genre }}</td>
                        <td>{{ $festival->datum }}</td>
                        <td>{{ $festival->beschrijving }}</td>
                        <td>
                            <a href="{{ route('festivals.show', $festival) }}">Bekijk</a>
                            @auth
                                @if(auth()->user()->role === 'planner' || auth()->user()->role === 'admin')
                                    <a href="{{ route('festivals.edit', $festival) }}">Bewerken</a>
                                    <form action="{{ route('festivals.destroy', $festival) }}" method="POST" style="display:inline;">
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