<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSuspension
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_suspended) {
            Auth::logout();

            return redirect()->route('login')->with([
                'suspended' => 'Your account has been suspended due to: ' . Auth::user()->suspend_reason,
            ]);
        }

        return $next($request);
    }
}


