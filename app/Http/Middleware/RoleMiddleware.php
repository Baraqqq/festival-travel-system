<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        Log::info('Middleware bereikt'); // Log dat de middleware wordt bereikt
        Log::info('Auth::check(): ' . Auth::check()); // Log of de gebruiker is ingelogd

        if (!Auth::check()) {
            Log::warning('Gebruiker niet ingelogd, omleiden naar loginpagina');
            return redirect('login'); // Stuur naar loginpagina als niet ingelogd
        }

        $user = Auth::user();
        Log::info('Ingelogde gebruiker: ', ['email' => $user->email, 'role' => $user->role]); // Log de gebruiker en rol

        if (!in_array($user->role, $roles)) {
            Log::warning('Gebruiker heeft geen toegang, omleiden naar dashboard', ['role' => $user->role, 'required_roles' => $roles]);
            return redirect('dashboard'); // Stuur naar dashboard als rol niet klopt
        }

        Log::info('Gebruiker heeft toegang, doorgaan naar volgende request');
        return $next($request); // Ga verder als alles klopt
    }
}