<?php

class CheckRole {

    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = auth()->user();
        
        if (!in_array($user->role, $roles)) {
            abort(403, 'No tienes permiso para acceder');
        }

        return $next($request);
    }
}