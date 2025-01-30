
@extends('layouts.app')

@section('content')
    <h1>Gebruikers</h1>
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}">Bewerken</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection