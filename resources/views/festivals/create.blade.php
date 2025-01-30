@extends('layouts.app')

@section('content')
    <h1>Festival Toevoegen</h1>
    <form method="POST" action="{{ route('festivals.store') }}">
        @csrf
        <div>
            <label for="naam">Naam</label>
            <input type="text" name="naam" id="naam" required>
        </div>
        <div>
            <label for="locatie">Locatie</label>
            <input type="text" name="locatie" id="locatie" required>
        </div>
        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" required>
        </div>
        <div>
            <label for="datum">Datum</label>
            <input type="date" name="datum" id="datum" required>
        </div>
        <div>
            <label for="beschrijving">Beschrijving</label>
            <textarea name="beschrijving" id="beschrijving"></textarea>
        </div>
        <button type="submit">Opslaan</button>
    </form>
@endsection