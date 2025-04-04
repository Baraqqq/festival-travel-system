<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/images.png') }}" alt="Windesheim Logo" class="navbar-logo">
                </a>
            </div>
            <ul class="navbar-nav navbar-nav-center">
                <li><a href="{{ route('festivals.index') }}" data-hover="Festivals">Festivals</a></li>
                <li><a href="{{ route('buses.index') }}" data-hover="Bussen">Bussen</a></li>
                @auth
                <li><a href="{{ route('dashboard') }}" data-hover="Dashboard">Dashboard</a></li>
                <li><a href="{{ route('bookings.index') }}" data-hover="Boekingen">Boekingen</a></li>
                <li><a href="{{ route('points.index') }}" data-hover="Punten">Punten</a></li>
                @endauth
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                @guest
                    <li><a href="{{ route('login') }}" data-hover="Login">Login</a></li>
                    <li><a href="{{ route('register') }}" class="register-button" data-hover="Register">Register</a></li>
                @else
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" data-hover="Logout">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdowns = document.querySelectorAll('.dropdown');
        
        dropdowns.forEach(dropdown => {
            const toggle = dropdown.querySelector('.dropdown-toggle');
            const menu = dropdown.querySelector('.dropdown-menu');
            
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                menu.classList.toggle('show');
            });
            
            // Close the dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        });
    });
</script>