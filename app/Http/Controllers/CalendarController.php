<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class CalendarController extends Controller
{
    public function view_calnder(){
    	$events = Event::get();
    	//$events->summary;
    	//dd($events);

    	return view('Calendar.view_calendar',['events'=>$events]);
    }
}
