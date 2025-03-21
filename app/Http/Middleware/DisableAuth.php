<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisableAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Laat alle verzoeken door zonder authenticatie te controleren
        return $next($request);
    }
}