<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Jenssegers\Agent\Agent;

class MobileCheck
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
        $agent = new Agent();
        if ($agent->isMobile())
            if ( !$request->session()->has('mobile_choise') ) {
                if ($request->ajax()) {
                    return $next($request);
                } else {
                    $request->session()->put('mobile_choise', true);
                    return redirect()->url('/mobile');
                }
            }

        return $next($request);
    }
}
