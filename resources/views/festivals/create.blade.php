
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Festival Aanmaken</h1>
    <form action="{{ route('test.festivals.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" required>
        </div>
        <div class="mb-3">
            <label for="locatie" class="form-label">Locatie</label>
            <input type="text" class="form-control" id="locatie" name="locatie" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="datum" class="form-label">Datum</label>
            <input type="date" class="form-control" id="datum" name="datum" required>
        </div>
        <div class="mb-3">
            <label for="beschrijving" class="form-label">Beschrijving</label>
            <textarea class="form-control" id="beschrijving" name="beschrijving" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection