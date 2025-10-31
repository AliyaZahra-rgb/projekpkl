<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (!Auth::guard('admin')->check()) {
            // Jangan redirect loop ke login-admin sendiri
            if ($request->is('adminlogin') || $request->is('adminlogin/*')) {
                return $next($request);
            }
            return redirect('/adminlogin');
        }

        return $next($request);
    }
}
