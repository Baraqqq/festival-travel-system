<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebugAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            dd('Gebruiker is niet ingelogd');
        }

        dd('Gebruiker is ingelogd', Auth::user());

        return $next($request);
    }
}