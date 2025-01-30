<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Festival Travel System') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('festivals.index') }}">Festivals</a></li>
                <li><a href="{{ route('buses.index') }}">Bussen</a></li>
                <li><a href="{{ route('bookings.index') }}">Boekingen</a></li>
                <li><a href="{{ route('points.index') }}">Punten</a></li>
                <li><a href="{{ route('users.index') }}">Gebruikers</a></li>
            </ul>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>