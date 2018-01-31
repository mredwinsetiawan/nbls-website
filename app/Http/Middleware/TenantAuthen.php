<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TenantAuthen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        $explode = explode('.', $_SERVER['HTTP_HOST']);
//            array_shift for pick first value of array
        $subdomain = array_shift($explode);
        Log::debug($explode);


        if (Auth::check()) {
            $me = Auth::user();
            Log::debug($me);

//            if ($me->tenant()->subdomain != $subdomain)
//                return redirect()->route('tenant.landing');

        } else {
            Log::error('Not Authenticated');
            return redirect()->route('tenant.landing', $subdomain);
        }
        
        return $next($request);
    }
}
