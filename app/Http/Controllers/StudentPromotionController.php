<?php

namespace App\Http\Controllers;

use App\Jobs\Graduatingtograduated;
use App\Jobs\level100to200;
use App\Jobs\level200to300;
use App\Jobs\level300to400;
use App\Jobs\level400tograduating;
use Illuminate\Http\Request;

class StudentPromotionController extends Controller
{
    public function promotestudent(){
    	return view('Student_promotion.promote_student');
    }


    public function gradtatingtograduated(){
    	 // Graduatingtograduated::dispatch($podcast)
    	 Graduatingtograduated::dispatch();
    	 return Redirect()->back()->with('message','Process Submitted Successfully!');
    	# $this->dispatch(new Graduatingtograduated())->onQueue('gradtatingtograduated');
    }


    public function l400tograduating(){
    	$this->dispatch(new level400tograduating());
    	return Redirect()->back()->with('message','Process Submitted Successfully!');
    }

    public function l300to400(){
    	level300to400::dispatch()->onQueue('levelthreetofour');
    	return Redirect()->back()->with('message','Process Submitted Successfully!');
    	# $this->dispatch(new level300to400())->onQueue('levelthreetofour');
    }

    public function l200to300(){
    	level200to300::dispatch()->onQueue('l200to300');
    	return Redirect()->back()->with('message','Process Submitted Successfully!');
    	# $this->dispatch(new level200to300())->onQueue('l200to300');
    }

    public function l100to200(){
    	level100to200::dispatch()->onQueue('l100to200');
    	return Redirect()->back()->with('message','Process Submitted Successfully!');
    	# $this->dispatch(new level100to200())->onQueue('l100to200');
    }



}
