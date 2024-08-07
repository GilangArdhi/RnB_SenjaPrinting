<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        foreach ($roles as $role) {
            if (Auth::user()->isCustomerService() && $role === 'customer service') {
                return $next($request);
            }
            if (Auth::user()->isProduksi() && $role === 'produksi') {
                return $next($request);
            }
            if (Auth::user()->isQualityControl() && $role === 'quality control') {
                return $next($request);
            }
            if (Auth::user()->isPackage() && $role === 'package') {
                return $next($request);
            }
            if (Auth::user()->isPengiriman() && $role === 'pengiriman') {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }
}
