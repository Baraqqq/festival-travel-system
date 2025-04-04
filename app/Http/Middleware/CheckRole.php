<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $roles)
    {
        // Controleer of de gebruiker is ingelogd
        if (!Auth::check()) {
            return redirect('login');
        }
        
        // Split de rollen op basis van de pipe-operator
        $allowedRoles = explode('|', $roles);
        
        // Controleer of de gebruiker een van de toegestane rollen heeft
        if (in_array($request->user()->role, $allowedRoles)) {
            return $next($request);
        }
        
        // Gebruiker heeft niet de juiste rol
        abort(403, 'Unauthorized action.');
    }
}