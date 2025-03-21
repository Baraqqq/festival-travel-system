<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        dd([
            'is_logged_in' => Auth::check(),
            'user' => $request->user(),
            'required_role' => $role,
        ]);
    
    
        // Controleer of de gebruiker is ingelogd
        if (!Auth::check()) {
            return redirect('login'); // Stuur naar loginpagina als niet ingelogd
        }

        // Controleer of de gebruiker de juiste rol heeft
        if ($request->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}