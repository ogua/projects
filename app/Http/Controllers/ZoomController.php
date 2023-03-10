<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zoom;
use Validator;
use App\Programme;
use App\Zoomweb;
use App\Staffmeeting;
use Carbon\Carbon;
use Response;
use Yajra\DataTables\Facades\DataTables;
use URL;
use App;

use Spatie\TranslationLoader\LanguageLine;

class ZoomController extends Controller
{
    public function index(){
    // $message = trans('validation.required');
    // //app()->setLocale('nl');

    // echo $message;

    // exit();
    
    //     LanguageLine::create([
    //        'group' => 'validation',
    //        'key' => 'required',
    //        'text' => ['en' => 'This is a required field', 'nl' => 'Dit is een verplicht veld'],
    //     ]);


    //     exit();

    //         //composer remove vendor/n4cc

    //         $pdf = App::make('dompdf.wrapper');
    //         $pdf->loadHTML('<h1>Test</h1>');
    //         return $pdf->stream();

    // 	 // $webinar = Zoom::user()->find('ogua.ahmed18@gmail.com')->webinars()->create(
	   //  	//  	[
		  //   //   'topic' => 'New webinar',
		  //   //   'type' => 2,
		  //   //   'start_time' => new Carbon('2020-08-12 10:00:00') // best to use a Carbon instance here.
	   //   //    ]
    // 	 // );

    //     # dd($webinar);


    	$prog = Programme::all();
    	return view('Zoom.add_meeting',['prog'=>$prog]);
    }


public function save_meeting(Request $request){

	$rules = array(
		'title' => 'required',
		'start-time' => 'required',
		'duration' => 'required',
		'level' => 'required',
		'session' => 'required',
		'programme' => 'required',
		'cousers' => 'required'
	);


    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		 return Response::json(array(
			        'success' => false,
			        'errors' => $validator->getMessageBag()->toArray()

			 ), 400);
    	}


    $data = [
    	'topic' => $request->input('title'),
    	'start_time' => new Carbon($request->input('start-time')),
    	'duration' => $request->input('duration')
    ];

    $meeting = Zoom::user()->find('ogua.ahmed18@gmail.com')
    ->meetings()->create($data);


     if ($meeting) {

     	 $meeting->settings()->make([
	      'host_video' => true,
	      'participant_video' => true,
	      'join_before_host' => true,
	      'approval_type' => 2,
	      'registration_type' => 2,
	      'enforce_login' => false,
	      'waiting_room' => false,
	    ]);

     	#$meeting->save();

     	 $details = [
     	 	'zoomid' => $meeting->id,
     	 	'user_id' => $meeting->user_id,
     	 	'uuid' => $meeting->uuid,
     	 	'lec_id' => auth()->user()->id,
     	 	'lec_name' => auth()->user()->name,
     	 	'title' => $request->input('title'),
     	 	'starttime' => $request->input('start-time'),
     	 	'duration' => $request->input('duration'),
     	 	'level' => $request->input('level'),
     	 	'session' => $request->input('session'),
     	 	'programme' => $request->input('programme'),
     	 	'cousers' => $request->input('cousers'),
     	 	'join_url' => $meeting->join_url,
     	 	'start_url' => $meeting->start_url
     	 ];


     	 $zoom = new Zoomweb($details);
     	 $zoom->save();

     	 return Response::json(array(
			        'success' => '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    Meeting Created Successfully!
                </div> '
	    ), 200);

     }




}




public function all_meeting(){

$zoom = Zoomweb::latest()->get();
        return Datatables::of($zoom)
         ->addColumn('action', function ($meeting) {

         		$now = Carbon::now('GMT');

         		$add = $now->copy()->addHours(2);

         		$date = new Carbon($meeting->starttime);

         		if ($add->gt($date)) {
         			return '
         				<a href="'.$meeting->start_url.'" class="btn btn-xs btn-success"><i class="fa fa-history"></i> Start Now </a>

         				<a href="#" cid="'.$meeting->id.'" class="del-meeting btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>
         				';
         		}         		
         		
         		return '
	                <a href="'.$meeting->start_url.'" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-user"></i>Start Meeting</a>

	                <a href="'.$meeting->join_url.'" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-user-plus"></i>Join Meeting</a>

	                 <a href="#" cid="'.$meeting->id.'" class="del-meeting btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>

	                ';
                
            })
          ->addIndexColumn()
          ->editColumn('starttime', function ($time) {
                return \Carbon\Carbon::parse($time->starttime)->diffForHumans();
            })
            ->make(true);


}



public function del_meeting(Request $request){
	$id = $request->post('id');

	$zoomweb = Zoomweb::where('id',$id)->first();
	$zoomweb->delete();

	return true;
}


public function join_meeting(){
	$zoom = Zoomweb::latest()->get();
	return view('Zoom.join_meeting',['zoom'=>$zoom]);
}


public function student_all_meeting(){

$zoom = Zoomweb::latest()->get();
        return Datatables::of($zoom)
         ->addColumn('action', function ($meeting) {

         		$now = Carbon::now('GMT');

         		$add = $now->copy()->addHours(2);

         		$date = new Carbon($meeting->starttime);

         		// if ($add->gt($date)) {
         		// 	return '
         		// 		<a href="'.$meeting->join_url.'" class="btn btn-xs btn-success"><i class="fa fa-history"></i> Start Now </a>';
         		// }         		
         		
         		return '
	                <a href="'.$meeting->join_url.'" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-user-plus"></i>Join Meeting</a>

	                ';
                
            })
          ->addIndexColumn()
          ->editColumn('starttime', function ($time) {
                return \Carbon\Carbon::parse($time->starttime)->diffForHumans();
            })
            ->make(true);
}



public function staff_meeting(){
    return view('Zoom.staff_meeting');
}


public function staff_meeting_save(Request $request){

    $rules = array(
        'title' => 'required',
        'start-time' => 'required',
        'duration' => 'required'
    );


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
             return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()

             ), 400);
        }


    $data = [
        'topic' => $request->input('title'),
        'start_time' => new Carbon($request->input('start-time')),
        'duration' => $request->input('duration')
    ];

    $meeting = Zoom::user()->find('ogua.ahmed18@gmail.com')
    ->meetings()->create($data);


     if ($meeting) {

         $meeting->settings()->make([
          'host_video' => true,
          'participant_video' => true,
          'join_before_host' => true,
          'approval_type' => 2,
          'registration_type' => 2,
          'enforce_login' => false,
          'waiting_room' => false,
        ]);

        #$meeting->save();

         $details = [
            'zoomid' => $meeting->id,
            'user_id' => $meeting->user_id,
            'uuid' => $meeting->uuid,
            'created_by_id' => auth()->user()->id,
            'created_by' => auth()->user()->name,
            'title' => $request->input('title'),
            'starttime' => $request->input('start-time'),
            'duration' => $request->input('duration'),
            'join_url' => $meeting->join_url,
            'start_url' => $meeting->start_url
         ];


         $zoom = new Staffmeeting($details);
         $zoom->save();

         return Response::json(array(
                    'success' => '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    Meeting Created Successfully!
                </div> '
        ), 200);

     }

}


public function all_staff_meeting(){

    $zoom = Staffmeeting::latest()->get();
        return Datatables::of($zoom)
         ->addColumn('action', function ($meeting) {

                $now = Carbon::now('GMT');

                $add = $now->copy()->addHours(2);

                $date = new Carbon($meeting->starttime);

                if ($add->gt($date)) {
                    return '
                        <a href="'.$meeting->start_url.'" class="btn btn-xs btn-success"><i class="fa fa-history"></i> Start Now </a>

                        <a href="#" cid="'.$meeting->id.'" class="del-meeting btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>
                        ';
                }               
                
                return '
                    <a href="'.$meeting->start_url.'" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-user"></i>Start Meeting</a>

                    <a href="'.$meeting->join_url.'" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-user-plus"></i>Join Meeting</a>

                     <a href="#" cid="'.$meeting->id.'" class="del-meeting btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>

                    ';
                
            })
          ->addIndexColumn()
          ->editColumn('starttime', function ($time) {
                return \Carbon\Carbon::parse($time->starttime)->diffForHumans();
            })
            ->make(true);


}



public function del_meeting_staff(Request $request){
    $id = $request->post('id');

    $zoomweb = Staffmeeting::where('id',$id)->first();

    $created_by = $zoomweb->created_by_id;

    if ($created_by == auth()->user()->id) {
        $zoomweb->delete();
        return 'true';
    }
    
    return 'false';
}












}
