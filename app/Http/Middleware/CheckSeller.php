<?php

namespace App\Http\Middleware;

use Closure;

class CheckSeller
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
        if ( $request->user()->roles->count()>=1 && $request->user()->role()->reference === config('app.role.seller')) {
            return $next($request);
        }
        return redirect()->back();
    }
}
