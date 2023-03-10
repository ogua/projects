<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class SiteAnalyticsController extends Controller
{
    public function view_analytics(){
    	
    //fetch the most visited pages for today and the past week
     $mostvisitepages = Analytics::fetchMostVisitedPages(Period::days(7));

     
     $totalusers = Analytics::fetchUserTypes(Period::days(7));
     // dd($totalusers[0]['sessions']);

     $totalvisitornpage = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));


     //dd($totalvisitornpage);

     return view('Analytics.page_info',[
     	'MostvisitedPages'=>$mostvisitepages,
     	'totalusers'=> $totalusers,
     	'totalvisitornpage' => $totalvisitornpage
     ]);

    }
}
