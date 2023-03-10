<?php

namespace App\Http\Controllers;

use App\Academicyear;
use App\Hall;
use App\LecCource;
use App\Programme;
use App\Programmecourse;
use App\Studentinfo;
use App\Timetable;
use App\Timetablegroup;
use App\Uploadedtimetable;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Response;
use Validator;


class TimetableController extends Controller
{
    public function add_timetable(){

    	$prog = Programme::all();
    	$hall = Hall::all();

    	// $start = Carbon::createFromTimeString('06:30');
    	// $end = Carbon::createFromTimeString('09:30');

    	// $now = Carbon::createFromTimeString('05:00');
    	// $nend = Carbon::createFromTimeString('9:00');

    	// if ($now->between($start,$end) || $nend->between($start,$end)) {
    	// 	echo"Between it";
    	// }else{
    	// 	echo"This is not in Between the time range";
    	// }



    	return view('Timetable.add_timetable',['prog'=> $prog, 'hall'=>$hall]);
    }


    public function getcources(Request $request){
    	$code =  $request->post('cid');
    	$level = $request->post('level');
    	$session = $request->post('session');




    	//get current academic year
    	$cademicyear = Academicyear::where('status',1)->first();
    	$academic = $cademicyear->acdemicyear;
    	$semester = $cademicyear->semester;

    	//DB::enableQueryLog();

    	$prog = Programmecourse::where('level',$level)
    	->where('progcode',$code)->where('semester',$semester)
    	->get();

    	//DB::enableQueryLog();
    	//dd(DB::getQueryLog());

    	//dd($prog);

    	//exit();

    	return view('Timetable.courses', ['prog'=>$prog]);

    }



    public function getcources_bylevel(Request $request){
    	$code = $request->post('code');
    	$level = $request->post('level');

    	//get current academic year
    	$cademicyear = Academicyear::where('status',1)->first();
    	$academic = $cademicyear->acdemicyear;
    	$semester = $cademicyear->semester;

    	//get cources for the semester
    	$prog = Programmecourse::where('level',$level)
    	->where('progcode',$code)->where('semester',$semester)
    	->get();


    	return view('Timetable.courses', ['prog'=>$prog]);


    }




    public function gettotal_students(Request $request){
    	$pcode = $request->post('code');
    	$level = $request->post('level');


    	$prog = Programme::where('code',$pcode)->first();
    	$progname = $prog->name;


    	$totalstudent = Studentinfo::where('currentlevel',$level)
    	->where('programme',$progname)->get();


    	return count($totalstudent);


    }



    public function get_lectures(Request $request){
    	$code = $request->get('Ccode');

    	$lecourse = LecCource::where('code',$code)->get();

    	//$couse = Course::where('code',$code)->first();

    	return view('Timetable.lecturers', ['lecourse'=>$lecourse]);
    }


    public function sub_number(Request $request){
    	$hall = $request->get('hall');
    	$gethall = explode(",", $hall);

    	$capacity = $gethall[1];


    	return $capacity;
    }




    public function save_timetable(Request $request){
    	//dd($request);

    	// $this->validate($request,[
    	// 	'level'=> 'required',
    	// 	'session'=> 'required',
    	// 	'programme'=> 'required',
    	// 	'session'=> 'required',
    	// 	'hall1'=> 'required',
    	// 	'grp1'=> 'required',
    	// 	'day'=> 'required',
    	// 	'stime'=> 'required',
    	// 	'etime'=> 'required'
    	// ]);

    	$rules = array(
    		'level'=> 'required',
    		'session'=> 'required',
    		'programme'=> 'required',
    		'cousers'=> 'required',
    		'hall1'=> 'required',
    		'grp1'=> 'required',
    		'day'=> 'required',
    		'stime'=> 'required',
    		'etime'=> 'required'
    	);


    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		 return Response::json(array(
			        'success' => false,
			        'errors' => $validator->getMessageBag()->toArray()

			 ), 400);
    	}


    	$progcourse = Programmecourse::where('coursecode', $request->post('cousers'))->first();


    	$suberror = array();
    	$suberror['error'] = false;

    	$suberror['stime'] = '';
    	$suberror['grp1'] = '';

    	//check if Lecture hall has already been occupied
    	if ($request->has('hall1')) {
    		$hall = explode(",", $request->post('hall1'));

    		#dd($request->post('hall1'));

    		$checkhallntime1 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime')
    		->where('group',$hall[0])
    		->where('day',$request->post('day'))->get();


    		//check if the hall and day has been occupied
    		if (!$checkhallntime1->isEmpty()) {
    			#dd($checkhallntime1);

    			/* if there is data. get data and check if the time specify is same as
    			the time from the database */
    			foreach ($checkhallntime1 as $checkhallntime) {
    			# get lecture end time
    			 $start1 = Carbon::createFromTimeString($checkhallntime->ftime);
    	         $end2 = Carbon::createFromTimeString($checkhallntime->ttime);

    			 $tstart1 = Carbon::createFromTimeString($request->post('stime'));
    			 $tend1 = Carbon::createFromTimeString($request->post('etime'));

    			 if ($tstart1->between($start1,$end2) || $tend1->between($start1,$end2)) {
    			 	//display an error. Lecture Hall and time has been occupied.

    			 	$suberror['error'] = true;
	    		    $suberror['grp1'] .= 
	    				'<div class="alert alert-danger alert-dismissible">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					             <h4><i class="icon fa fa-warning">
					                    </i> Failed!</h4>
					           '.$hall[0].' has already been Occupied, Please choose a time not within this range '.$checkhallntime->ftime.' - '.$checkhallntime->ttime.'
					    </div> ';


    			 }else{
    			 	//if the time is not in range, fetch for the lecturer details and time assigned to the lecturer to see if the time is also in reange with the lecturer time assigned to him.

    			 	$leccheck1 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp1'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck1->isEmpty()) {
			    		foreach ($leccheck1 as $leccheck) {
			    			$lstart1 = Carbon::createFromTimeString($leccheck->ftime);
    	                    $lend2 = Carbon::createFromTimeString($leccheck->ttime);

			    			$ltstart1 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend1 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart1->between($lstart1,$lend2) || $ltend1->between($lstart1,$lend2) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp1').' has already been Occupied, Please choose a time not within this range '.$checkhallntime->ftime.' - '.$checkhallntime->ttime.'
							    </div> ';

			    			}else{
			    				//register lectirer into the database
			    				
			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    		

			    	}




    			 }


    		    }
			
			}else{

    			$leccheck1 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp1'))
			    		->where('day',$request->post('day'))->get();

			  

			    	//if lecture or data exist
			    	if (!$leccheck1->isEmpty()) {

			    		foreach ($leccheck1 as $leccheck) {
			    			$lstart1 = Carbon::createFromTimeString($leccheck->ftime);
    	                    $lend2 = Carbon::createFromTimeString($leccheck->ttime);

			    			$ltstart1 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend1 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart1->between($lstart1,$lend2) || $ltend1->between($lstart1,$lend2) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp1').' has already been Occupied, Please choose a time not within this range '.$leccheck->ftime.' - '.$leccheck->ttime.'
							    </div> ';


			    			}else{
			    				//register lecturer into the database
			    				
			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    		
			    		
			    	}

    		}


		}



		# return json_encode($suberror);

		 #dd($checkhallntime1);


//hall 2 group 2

	//check if Lecture hall has already been occupied
    	if (!empty($request->post('hall2'))) {
    		$hall2 = explode(",", $request->post('hall2'));

    		$checkhallntime22 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime')
    		->where('group',$hall2[0])
    		->where('day',$request->post('day'))->get();

    		//check if the hall and day has been occupied
    		if (!$checkhallntime22->isEmpty()) {
    			/* if there is data. get data and check if the time specify is same as
    			the time from the database */
    			foreach ($checkhallntime22 as $checkhallntime2) {
    			# get lecture end time
    			 $start2 = Carbon::createFromTimeString($checkhallntime2->ftime);
    	         $end22 = Carbon::createFromTimeString($checkhallntime2->ttime);

    			 $tstart2 = Carbon::createFromTimeString($request->post('stime'));
    			 $tend2 = Carbon::createFromTimeString($request->post('etime'));

    			 if ($tstart2->between($start2,$end22) || $tend2->between($start2,$end22)) {
    			 	//display an error. Lecture Hall and time has been occupied.

    			 	$suberror['error'] = true;
	    		    $suberror['grp1'] .= 
	    				'<div class="alert alert-danger alert-dismissible">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					             <h4><i class="icon fa fa-warning">
					                    </i> Failed!</h4>
					           '.$hall2[0].' has already been Occupied, Please choose a time not within this range '.$checkhallntime2->ftime.' - '.$checkhallntime2->ttime.'
					    </div> ';


    			 }else{
    			 	//if the time is not in range, fetch for the lecturer details and time assigned to the lecturer to see if the time is also in reange with the lecturer time assigned to him.

    			 	$leccheck22 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp2'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck22->isEmpty()) {
			    		foreach ($leccheck22 as $leccheck2) {
			    			$lstart2 = Carbon::createFromTimeString($leccheck2->ftime);
    	                    $lend22 = Carbon::createFromTimeString($leccheck2->ttime);

			    			$ltstart2 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend2 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart2->between($lstart2,$lend22) || $ltend2->between($lstart2,$lend22) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp2').' has already been Occupied, Please choose a time not within this range '.$leccheck2->ftime.' - '.$leccheck2->ttime.'
							    </div> ';

			    			}else{
			    				//register lecturer into the database

			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    	}




    			 }


    		    }
			
			}
			else{

    			$leccheck22 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp2'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck22->isEmpty()) {

			    		foreach ($leccheck22 as $leccheck2) {
			    			$lstart2 = Carbon::createFromTimeString($leccheck2->ftime);
    	                    $lend22 = Carbon::createFromTimeString($leccheck2->ttime);

			    			$ltstart2 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend2 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart2->between($lstart2,$lend22) || $ltend2->between($lstart2,$lend22) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp2').' has already been Occupied, Please choose a time not within this range '.$leccheck2->ftime.' - '.$leccheck2->ttime.'
							    </div> ';

			    			}else{
			    				//register lecturer into the database

			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    	}


    		}


		}
	




//hall 3 group 3
 //check if Lecture hall has already been occupied
    	if (!empty($request->post('hall3'))) {
    		$hall3 = explode(",", $request->post('hall3'));

    		$checkhallntime23 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime')
    		->where('group',$hall3[0])
    		->where('day',$request->post('day'))->get();

    		//check if the hall and day has been occupied
    		if (!$checkhallntime23->isEmpty()) {
    			/* if there is data. get data and check if the time specify is same as
    			the time from the database */
    			foreach ($checkhallntime23 as $checkhallntime3) {
    			# get lecture end time
    			 $start3 = Carbon::createFromTimeString($checkhallntime3->ftime);
    	         $end23 = Carbon::createFromTimeString($checkhallntime3->ttime);

    			 $tstart3 = Carbon::createFromTimeString($request->post('stime'));
    			 $tend3 = Carbon::createFromTimeString($request->post('etime'));

    			 if ($tstart3->between($start3,$end23) || $tend3->between($start3,$end23)) {
    			 	//display an error. Lecture Hall and time has been occupied.

    			 	$suberror['error'] = true;
	    		    $suberror['grp1'] .= 
	    				'<div class="alert alert-danger alert-dismissible">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					             <h4><i class="icon fa fa-warning">
					                    </i> Failed!</h4>
					           '.$hall3[0].' has already been Occupied, Please choose a time not within this range '.$checkhallntime3->ftime.' - '.$checkhallntime3->ttime.'
					    </div> ';


    			 }else{
    			 	//if the time is not in range, fetch for the lecturer details and time assigned to the lecturer to see if the time is also in reange with the lecturer time assigned to him.

    			 	$leccheck23 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp3'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck23->isEmpty()) {
			    		foreach ($leccheck23 as $leccheck3) {
			    			$lstart3 = Carbon::createFromTimeString($leccheck3->ftime);
    	                    $lend23 = Carbon::createFromTimeString($leccheck3->ttime);

			    			$ltstart3 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend3 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart3->between($lstart3,$lend23) || $ltend3->between($lstart3,$lend23) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp3').' has already been Occupied, Please choose a time not within this range '.$leccheck3->ftime.' - '.$leccheck3->ttime.'
							    </div> ';

			    			}else{
			    				//register lecturer into the database

			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    	}




    			 }


    		    }
			
			}
			else{

    			$leccheck23 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp3'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck23->isEmpty()) {
			    		foreach ($leccheck23 as $leccheck3) {
			    			$lstart3 = Carbon::createFromTimeString($leccheck3->ftime);
    	                    $lend23 = Carbon::createFromTimeString($leccheck3->ttime);

			    			$ltstart3 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend3 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart3->between($lstart3,$lend23) || $ltend3->between($lstart3,$lend23) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp3').' has already been Occupied, Please choose a time not within this range '.$leccheck3->ftime.' - '.$leccheck3->ttime.'
							    </div> ';

			    			}else{
			    				//register lecturer into the database

			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    	}


    		}


		}
	







//hall 4 group 4
 //check if Lecture hall has already been occupied
    	if (!empty($request->post('hall4'))) {
    		$hall4 = explode(",", $request->post('hall4'));

    		$checkhallntime24 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime')
    		->where('group',$hall4[0])
    		->where('day',$request->post('day'))->get();

    		//check if the hall and day has been occupied
    		if (!$checkhallntime24->isEmpty()) {
    			/* if there is data. get data and check if the time specify is same as
    			the time from the database */
    			foreach ($checkhallntime24 as $checkhallntime4) {
    			# get lecture end time
    			 $start4 = Carbon::createFromTimeString($checkhallntime4->ftime);
    	         $end24 = Carbon::createFromTimeString($checkhallntime4->ttime);

    			 $tstart4 = Carbon::createFromTimeString($request->post('stime'));
    			 $tend4 = Carbon::createFromTimeString($request->post('etime'));

    			 if ($tstart4->between($start4,$end24) || $tend4->between($start4,$end24)) {
    			 	//display an error. Lecture Hall and time has been occupied.

    			 	$suberror['error'] = true;
	    		    $suberror['grp1'] .= 
	    				'<div class="alert alert-danger alert-dismissible">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					             <h4><i class="icon fa fa-warning">
					                    </i> Failed!</h4>
					           '.$hall4[0].' has already been Occupied, Please choose a time not within this range '.$checkhallntime4->ftime.' - '.$checkhallntime4->ttime.'
					    </div> ';


    			 }else{
    			 	//if the time is not in range, fetch for the lecturer details and time assigned to the lecturer to see if the time is also in reange with the lecturer time assigned to him.

    			 	$leccheck24 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp4'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck24->isEmpty()) {
			    		foreach ($leccheck24 as $leccheck4) {
			    			$lstart4 = Carbon::createFromTimeString($leccheck4->ftime);
    	                    $lend24 = Carbon::createFromTimeString($leccheck4->ttime);

			    			$ltstart4 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend4 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart4->between($lstart4,$lend24) || $ltend4->between($lstart4,$lend24) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp4').' has already been Occupied, Please choose a time not within this range '.$leccheck4->ftime.' - '.$leccheck4->ttime.'
							    </div> ';

			    			}else{
			    				//register lecturer into the database

			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    	}




    			 }


    		    }
			
			}
			else{

    			$leccheck24 = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
			    		->select('timetablegroups.group','timetables.day','timetables.ftime','timetables.ttime','timetablegroups.lecturer')
			    		->where('lecturer', $request->post('grp4'))
			    		->where('day',$request->post('day'))->get();


			    	//if lecture or data exist
			    	if (!$leccheck24->isEmpty()) {
			    		foreach ($leccheck24 as $leccheck4) {
			    			$lstart4 = Carbon::createFromTimeString($leccheck4->ftime);
    	                    $lend24 = Carbon::createFromTimeString($leccheck4->ttime);

			    			$ltstart4 = Carbon::createFromTimeString($request->post('stime'));
			    			$ltend4 = Carbon::createFromTimeString($request->post('etime'));

			    			if ($ltstart4->between($lstart4,$lend24) || $ltend4->between($lstart4,$lend24) ) {
			    				//display error message

			    				$suberror['error'] = true;
	    		                $suberror['grp1'] .= 
			    				'<div class="alert alert-danger alert-dismissible">
							        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							             <h4><i class="icon fa fa-warning">
							                    </i> Failed!</h4>
							           '.$request->post('grp4').' has already been Occupied, Please choose a time not within this range '.$leccheck4->ftime.' - '.$leccheck4->ttime.'
							    </div> ';

			    			}else{
			    				//register lecturer into the database

			    			}

			    		}
			    		
			    	}else{
			    		//proceed if the lecture is not available for an course
			    	}

    		}


		}
	


		
		
    		//DB::enableQueryLog();

    		//check course and programme if they exit
    		$timetablev = Timetable::where('level',$request->post('level'))
    		->where('sesson',$request->post('session'))
    		->where('programme',$request->post('programme'))
    		->where('course',$request->post('cousers'))->first();

    		//dd(DB::getQueryLog());

    		//dd($timetablev);

    		if ($timetablev) {
    			$suberror['error'] = true;
    		    $suberror['cousers'] = 'Course Has already been recorded for '.
    		    $request->post('level').' '.$request->post('programme').' '.$request->post('session').' Students';
    		}

    		if ($suberror['error'] == true) {
    			return json_encode($suberror);
    		}else{


    			$cademicyear = Academicyear::where('status', 1)->first();
				$academicyear = $cademicyear->acdemicyear;
				$academicsem =  $cademicyear->semester;

    			#insert data into the database
    			$datatim = [
    				'level'=> $request->post('level'),
    				'sesson'=> $request->post('session'),
    				'programme'=> $request->post('programme'),
    				'course'=> $progcourse->coursetitle,
    				'coursecode' => $request->post('cousers'),
    				'day'=> $request->post('day'),
    				'ftime'=> $request->post('stime'),
    				'ttime'=> $request->post('etime'),
    				'semester'=> $academicsem,
    				'academicyear' => $academicyear
    			];

    			$timt = new Timetable($datatim);
    			$timt->save();

    			if ($request->has('hall1')) {
                                $lec1 = explode("-", $request->post('grp1'));
    							$hall1 = [
    								'hall'=> $hall[0],
			    					'group' => '',
			    					'capacity' => $hall[1],
			    					'lecturer' => $lec1[0],
                                    'lecturer_id' => $lec1[1]
			    				];
    				$lecgroup = new Timetablegroup($hall1);
    				$lecgroup->save();

    				$lecgroup->timetable_id = $timt->id;
    				$lecgroup->save();

    			}


    			if (!empty($request->post('hall2'))) {
    				$lecgroup->group = 'Group 1';
    				$lecgroup->save();
                                    $lec2 = explode("-", $request->post('grp2'));

    				                $hal2 = [
				    					'hall' => $hall2[0],
				    					'group' => 'Group 2',
				    					'capacity' => $hall2[1],
				    					'lecturer' => $lec2[0],
                                        'lecturer_id' => $lec2[1] 
				    				];

				    				
    				$lecgroup2 = new Timetablegroup($hal2);
    				$lecgroup2->save();

    				$lecgroup2->timetable_id = $timt->id;
    				$lecgroup2->save();
    			}



    			if (!empty($request->post('hall3'))) {
                                    $lec3 = explode("-", $request->post('grp3'));
    				                    $hal3 = [
					    					'hall' => $hall3[0],
					    					'group' => 'Group 3',
					    					'capacity' => $hall3[1],
					    					'lecturer' => $lec3[0],
                                            'lecturer_id' => $lec3[1] 
					    				];
    				$lecgroup3 = new Timetablegroup($hal3);
    				$lecgroup3->save();

    				$lecgroup3->timetable_id = $timt->id;
    				$lecgroup3->save();
    			}


    			if (!empty($request->post('hall4'))) {
                                        $lec4 = explode("-", $request->post('grp4'));
    				                    $hal4 = [
					    					'hall' => $hall4[0],
					    					'group' => 'Group 4',
					    					'capacity' => $hall4[1],
					    					'lecturer' => $lec4[0],
                                            'lecturer_id' => $lec4[1]
					    				];
    				$lecgroup4 = new Timetablegroup($hal4);
    				$lecgroup4->save();

    				$lecgroup4->timetable_id = $timt->id;
    				$lecgroup4->save();
    			}


    			return Response::json(array(
			        'success' => '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    TimeTable Recorded Successfully!
                </div> '
			 ), 200);



    		}
		
	


    }





public function generate_timetable(){

	return view('Timetable.genarate');
}



public function gentimetable_view(Request $request){
	$this->validate($request,[
		'level' => 'required',
		'session' => 'required'
	]);

	//$ses = explode(" ", $request->input('session'));
	$session = $request->input('session');


	$type = $request->input('type');

	$level = $request->input('level');

	# dd($session);


	$progs = Programme::all();

	$cademicyear = Academicyear::where('status', 1)->first();
	$academicyear = $cademicyear->acdemicyear;
	$academicsem =  $cademicyear->semester;


	$monday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->where('level',$request->input('level'))
    		->where('sesson', $request->input('session'))
    		->where('day','Monday')
    		->get();

   $tuesday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->where('level',$request->input('level'))
    		->where('sesson', $request->input('session'))
    		->where('day','Tuesday')
    		->get();

    $wedesday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->where('level',$request->input('level'))
    		->where('sesson', $request->input('session'))
    		->where('day','Wednesday')
    		->get();


    $thurday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->where('level',$request->input('level'))
    		->where('sesson', $request->input('session'))
    		->where('day','Thursday')
    		->get();


    $friday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
    		->where('level',$request->input('level'))
    		->where('sesson', $request->input('session'))
    		->where('day','Friday')
    		->get();

   //  $pdf = App::make('dompdf.wrapper');
   //  $pdf->loadHTML('<h1>Test</h1>');
   //  // $pdf->stream();
   // $pdf->download();

	return view('Timetable.timetable',['monday'=>$monday,'tuesday'=>$tuesday,'wedesday'=>$wedesday,'thurday'=>$thurday,'friday'=>$friday, 'progs'=>$progs,'academicyear'=>$academicyear, 'semester'=>$academicsem,'session' => $session, 'type'=>$type, 'level'=> $level]);

}



public function gen_timetable_lecturer(){

    return view('Timetable.lecturer-genarate');
}


public function lecturer_timetable(Request $request){
    $this->validate($request,[
        'level' => 'required',
        'session' => 'required'
    ]);

    //$ses = explode(" ", $request->input('session'));
    $session = $request->input('session');


    $type = $request->input('type');

    $level = $request->input('level');

    # dd($session);


    $progs = Programme::all();

    $cademicyear = Academicyear::where('status', 1)->first();
    $academicyear = $cademicyear->acdemicyear;
    $academicsem =  $cademicyear->semester;


    $monday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
            ->where('level',$request->input('level'))
            ->where('sesson', $request->input('session'))
            ->where('day','Monday')
            ->where('timetablegroups.lecturer_id',auth()->user()->id)
            ->get();

   $tuesday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
            ->where('level',$request->input('level'))
            ->where('sesson', $request->input('session'))
            ->where('day','Tuesday')
            ->where('timetablegroups.lecturer_id',auth()->user()->id)
            ->get();

    $wedesday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
            ->where('level',$request->input('level'))
            ->where('sesson', $request->input('session'))
            ->where('day','Wednesday')
            ->where('timetablegroups.lecturer_id',auth()->user()->id)
            ->get();


    $thurday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
            ->where('level',$request->input('level'))
            ->where('sesson', $request->input('session'))
            ->where('day','Thursday')
            ->where('timetablegroups.lecturer_id',auth()->user()->id)
            ->get();


    $friday = Timetable::join('timetablegroups', 'timetables.id','=','timetablegroups.timetable_id')
            ->where('level',$request->input('level'))
            ->where('sesson', $request->input('session'))
            ->where('day','Friday')
            ->where('timetablegroups.lecturer_id',auth()->user()->id)
            ->get();

    return view('Timetable.lecturer_timetable',['monday'=>$monday,'tuesday'=>$tuesday,'wedesday'=>$wedesday,'thurday'=>$thurday,'friday'=>$friday, 'progs'=>$progs,'academicyear'=>$academicyear, 'semester'=>$academicsem,'session' => $session, 'type'=>$type, 'level'=> $level]);
}



public function upload_timetable(){
	$timetables = Uploadedtimetable::all();
	return view('Timetable.upload_timetable',['timetable'=>$timetables]);
}


public function save_generated_timetable(Request $request){
	

	$rules = array(
		'level' => 'required',
		'session' => 'required',
		'type' => 'required',
		'pdf-file' => 'required|mimes:pdf'
	);


    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		 return Response::json(array(
			        'success' => false,
			        'errors' => $validator->getMessageBag()->toArray()

			 ), 400);
    	}



    $cademicyear = Academicyear::where('status', 1)->first();
	$academicyear = $cademicyear->acdemicyear;
	$academicsem =  $cademicyear->semester;

	# dd($request);

	$data = [
		'level'=> $request->input('level'),
		'session'=> $request->input('session'),
		'type'=> $request->input('type'),
		'academicyear' => $academicyear,
		'semester' => $academicsem,
		'url'=> $request->file('pdf-file')->store('Timetable','public')
	];

	$upload = new Uploadedtimetable($data);
	$upload->save($data);


	return Response::json(array(
			        'success' => '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    TimeTable Uploaded Successfully!
                </div> '
	), 200);


}




public function delete_timetable($id){
	$upload = Uploadedtimetable::where('id',$id)->first();

	//delete media from folder
	$storage= Storage::disk('public')->delete($upload->url); 
	
	$upload->delete();

	return Redirect()->back()->with('message','Timetable Deleted Successfully!');
}



public function edit_timetable($id){
	$timetables = Uploadedtimetable::where('id',$id)->first();
	return view('Timetable.edit_timetable',['timetable'=>$timetables]);
}


public function update_timetable(Request $request){
	$rules = array(
		'level' => 'required',
		'session' => 'required',
		'type' => 'required'
	);

	$id = $request->input('hiddenid');

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		 return Response::json(array(
			        'success' => false,
			        'errors' => $validator->getMessageBag()->toArray()

			 ), 400);
    	}


	# dd($request);
    $timetables = Uploadedtimetable::where('id',$id)->first();


	if ($request->has('url')) {
		//delete previuos img
		$storage= Storage::disk('public')->delete($upload->url); 

		$timetables->level = $request->input('level');
		$timetables->session = $request->input('session');
		$timetables->type = $request->input('type');
		$timetables->url = $request->file('pdf-file')->store('Timetable','public');
		$timetables->save();

	}else{
		$timetables->level = $request->input('level');
		$timetables->session = $request->input('session');
		$timetables->type = $request->input('type');
		$timetables->save();
	}


	

	return Response::json(array(
			        'success' => '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Success!</h4>
                    TimeTable Updated Successfully!
                </div> '
	), 200);
}



public function student_timetable(){
	$timetables = Uploadedtimetable::latest()->get();
	return view('Timetable.student_timetable',['timetable'=>$timetables]);
}









}
