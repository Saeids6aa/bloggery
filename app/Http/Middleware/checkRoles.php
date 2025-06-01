<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $admin = auth('admin')->user();
        if (! $admin) {
            abort(403);
        }

        if (in_array($admin->role, $roles)) {
            return $next($request);
        }
        abort(505);
        return response()->json('You dont have permession !');
    }
}
