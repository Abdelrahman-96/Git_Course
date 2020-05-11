<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()) {
            if (Auth::user()->isBlocked) {
                return response()->json(['message' => 'Access denied'], 401);
            }
            return $next($request);
        }
        return response()->json(['message' => 'Auth filled'], 401);
    }
}
