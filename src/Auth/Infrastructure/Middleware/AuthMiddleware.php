<?php

namespace Src\Auth\Infrastructure\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return response()->json([
                'error' => 'No autorizado',
            ], 401);
        }

        return $next($request);
    }

}
