<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
        .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
        .my-4 { margin-top: 1rem; margin-bottom: 1rem; }
        .p-4 { padding: 1rem; }
        .card { border: 1px solid #eee; border-radius: 0.5rem; }
        .shadow { box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); }
        .btn { display: inline-block; padding: 0.5rem 1rem; background-color: #eee; text-decoration: none; border-radius: 0.25rem; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        h1 { color: #333; }
    </style>
</head>
<body>
    <div class="container">
        <header class="py-4">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ url('/') }}">Home</a>
                <div>
                    @auth
                    <li><a href="{{ route('my-dashboard') }}" data-hover="Dashboard">Dashboard</a></li>
                    <li><a href="{{ route('bookings.index') }}" data-hover="Boekingen">Boekingen</a></li>
                    <li><a href="{{ route('my-points') }}" data-hover="Punten">Punten</a></li>

                        <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                            @csrf
                            <button type="submit" style="background: none; border: none; cursor: pointer;">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" style="margin-right: 1rem;">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>