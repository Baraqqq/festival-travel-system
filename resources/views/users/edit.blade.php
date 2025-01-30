@extends('layouts.app')

@section('content')
    <h1>Gebruiker Bewerken</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="role">Rol</label>
            <select name="role" id="role" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="planner" {{ $user->role == 'planner' ? 'selected' : '' }}>Planner</option>
                <option value="gast" {{ $user->role == 'gast' ? 'selected' : '' }}>Gast</option>
            </select>
        </div>
        <button type="submit">Opslaan</button>
    </form>
@endsection