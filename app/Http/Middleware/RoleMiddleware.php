<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {
        $user = $request->user();

        if (! $user) {
            abort(401);
        }

        $hasAllowedRole = $user->roles()
            ->whereIn('slug', $roles)
            ->exists();

        if (! $hasAllowedRole) {
            abort(403, 'You are not authorized to access this section.');
        }

        return $next($request);
    }
}
