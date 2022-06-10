<?php

namespace App\Http\Middleware;

use Closure;

class Privilages
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
        if(Session::get('privileges')!='admin'){
            return redirect()->back();
        }
        return $next($request);
    }
}
