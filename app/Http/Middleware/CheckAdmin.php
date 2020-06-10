<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        $role = $request->user()->roles()->orderBy('pivot_id','desc')->first();
        if ($role->reference === config('app.role.admin')) {
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
