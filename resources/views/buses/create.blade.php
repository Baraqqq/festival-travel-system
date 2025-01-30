@extends('layouts.app')

@section('content')
    <h1>Bus Toevoegen</h1>
    <form method="POST" action="{{ route('buses.store') }}">
        @csrf
        <div>
            <label for="festival_id">Festival</label>
            <select name="festival_id" id="festival_id" required>
                @foreach($festivals as $festival)
                    <option value="{{ $festival->id }}">{{ $festival->naam }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="capaciteit">Capaciteit</label>
            <input type="number" name="capaciteit" id="capaciteit" required>
        </div>
        <div>
            <label for="status">Status</label>
            <input type="text" name="status" id="status" required>
        </div>
        <div>
            <label for="breng_tijd">Breng Tijd</label>
            <input type="time" name="breng_tijd" id="breng_tijd" required>
        </div>
        <div>
            <label for="ophaal_tijd">Ophaal Tijd</label>
            <input type="time" name="ophaal_tijd" id="ophaal_tijd" required>
        </div>
        <div>
            <label for="ophaal_punt">Ophaal Punt</label>
            <input type="text" name="ophaal_punt" id="ophaal_punt" required>
        </div>
        <button type="submit">Opslaan</button>
    </form>
@endsection