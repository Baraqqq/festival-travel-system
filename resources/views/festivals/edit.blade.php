@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Festival Bewerken</h1>
    <form action="{{ route('festivals.update', $festival) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="naam" class="form-label">Naam</label>
            <input type="text" class="form-control" id="naam" name="naam" value="{{ $festival->naam }}" required>
        </div>
        <div class="mb-3">
            <label for="locatie" class="form-label">Locatie</label>
            <input type="text" class="form-control" id="locatie" name="locatie" value="{{ $festival->locatie }}" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="{{ $festival->genre }}" required>
        </div>
        <div class="mb-3">
            <label for="datum" class="form-label">Datum</label>
            <input type="date" class="form-control" id="datum" name="datum" value="{{ $festival->datum }}" required>
        </div>
        <div class="mb-3">
            <label for="beschrijving" class="form-label">Beschrijving</label>
            <textarea class="form-control" id="beschrijving" name="beschrijving" rows="3">{{ $festival->beschrijving }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection