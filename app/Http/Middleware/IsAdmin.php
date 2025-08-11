<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Remplace par l'email de ton admin
        $adminEmail = 'admin@gmail.com';

        if (!Auth::check() || Auth::user()->email !== $adminEmail) {
            return redirect('/')->with('error', "Accès refusé : vous n'êtes pas administrateur.");
        }

        return $next($request);
    }
}