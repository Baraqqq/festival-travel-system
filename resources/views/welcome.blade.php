@extends('layouts.app')

@section('content')
    <section class="hero">
        <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
        <div class="hero-content">
            <h1>Welkom bij <span class="highlight">Gebotours</span></h1>
            <p>Ontdek de beste festivals en plan je reis met gemak.</p>
            <a href="{{ route('festivals.index') }}" class="hero-button">Bekijk Festivals</a>
        </div>
    </section>
    <section class="content">
        <h2>Beschikbare Festivals</h2>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Genre</th>
                    <th>Datum</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($festivals as $festival)
                    <tr>
                        <td>{{ $festival->naam }}</td>
                        <td>{{ $festival->genre }}</td>
                        <td>{{ $festival->datum }}</td>
                        <td>
                            <a href="{{ route('festivals.show', $festival) }}">Bekijk</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection