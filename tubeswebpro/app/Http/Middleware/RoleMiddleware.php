<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Allow access only if the user has the specified role.
     * If role is 'admin' the user->isAdmin() must be true.
     * If role is 'user' the user must NOT be admin.
     * If no role provided, just require auth.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $isAdmin = method_exists($user, 'isAdmin') ? $user->isAdmin() : ($user->role ?? null) === 'admin';

        if ($role === 'admin' && ! $isAdmin) {
            abort(403);
        }

        if ($role === 'user' && $isAdmin) {
            abort(403);
        }

        return $next($request);
    }
}
