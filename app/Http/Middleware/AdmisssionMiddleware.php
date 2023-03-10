<?php

namespace App\Http\Middleware;
use Closure;
use App\Personalinfo;
use Illuminate\Support\Facades\Session;

class AdmisssionMiddleware
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
         if($id === null) {
            return Redirect()->route('online-admission-login');
         }else{
            $perinfo = Personalinfo::where('osncode_id',$id)->first();
            if ($perinfo) {
               $status = $perinfo->status;
                if ($status) {
                    return Redirect()->route('admission-completed');
                }else{
                     return $next($request);
                }
            }else{
                return $next($request);
            }   
           
         }
                 
    }
}
