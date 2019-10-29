<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->roles()->get();

            switch ($role[0]['roleType']) {
                case 'student':
                    return redirect()->route('dashboard');
                    break;
                default:
                    return redirect()->route('login');
                    break;
            }
        }

        return $next($request);
    }
}
