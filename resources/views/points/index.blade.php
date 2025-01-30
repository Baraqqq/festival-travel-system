@extends('layouts.app')

@section('content')
    <h1>Mijn Punten</h1>
    <table>
        <thead>
            <tr>
                <th>Aantal</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($points as $point)
                <tr>
                    <td>{{ $point->amount }}</td>
                    <td>
                        <form action="{{ route('points.destroy', $point) }}" method="POST" style="display:inline;">
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