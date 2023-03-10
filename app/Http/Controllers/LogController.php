<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;
use DB;
use App\User;

class LogController extends Controller
{
    public function viewlogs(){
    	
    	//$hall = Hall::latest()->first();
    	//dd($hall->audits);

    	 $audits = DB::table('audits')->orderBy('id','Desc')->get();
    	 $users = User::all();

    	 ///dd($audits );



    	return view('log.view_log',['audits'=>$audits, 'users'=>$users]);
    }
}
