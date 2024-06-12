<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailVerified
{
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->hasVerifiedEmail()) {
            return redirect('login')->with('error', 'Silakan verifikasi email Anda terlebih dahulu.');
        }

        return $next($request);
    }
}
