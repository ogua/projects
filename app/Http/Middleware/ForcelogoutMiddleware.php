<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForcelogoutMiddleware
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
        /*
          Check if user is authenticated
        */

        if (Auth::user()) {
            # code...
            $user = Auth::user()->force_logout;

            if ($user == 1) {
                # dd($request);
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return Redirect()->route('home');
            }else{
                return $next($request);
            }
        }else{

            # dd($request);
            return $next($request);
        }
        
        
    }
}
