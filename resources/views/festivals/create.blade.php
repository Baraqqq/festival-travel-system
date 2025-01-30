@extends('layouts.app')

@section('content')
    <section class="content">
        <h2>Festival Toevoegen</h2>
        <form action="{{ route('festivals.store') }}" method="POST">
            @csrf
            <div>
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>
            </div>
            <div>
                <label for="locatie">Locatie:</label>
                <input type="text" id="locatie" name="locatie" required>
            </div>
            <div>
                <label for="genre">Genre:</label>
                <input type="text" id="genre" name="genre" required>
            </div>
            <div>
                <label for="datum">Datum:</label>
                <input type="date" id="datum" name="datum" required>
            </div>
            <div>
                <label for="beschrijving">Beschrijving:</label>
                <textarea id="beschrijving" name="beschrijving"></textarea>
            </div>
            <button type="submit">Opslaan</button>
        </form>
    </section>
@endsection