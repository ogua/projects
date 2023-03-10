<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Session;

class BillMiddleware
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

        if ($request->segment('1') == 'home') {
            $code = $request->segment('2');
            //$maxcode = DB::table('sales')->where('brancode',$code)->get();
            $maxcode = DB::table('billmonitors')->where('brancode',$code)->max('bill_id');

           $request->session()->put('bill_id',$maxcode);  
        }
        


        //dd($maxcode);
        
        return $next($request);
    }
}
