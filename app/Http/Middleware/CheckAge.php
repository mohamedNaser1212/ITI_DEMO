<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $userAge = auth()->user()->age;

            if ($userAge <= 10) {
                return redirect('home');
            }
        }

        return $next($request);
    }
}
