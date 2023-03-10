<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Session;



class AdmissiondoneMiddleware
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
            $id = $request->session()->get('id');
            $progra = App\Personalinfo::find($id)->first();
            if ($progra->status) {
                return route('admission-completed');
            }
                
    }
}
