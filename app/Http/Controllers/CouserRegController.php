<?php

namespace App\Http\Controllers;

use App\Academicyear;
use App\Coureregistration;
use App\Examresults;
use App\Paymentdeadline;
use App\Programmecourse;
use App\Regacademicyear;
use App\Studentfee;
use App\Studentinfo;
use App\User;
use Illuminate\Http\Request;


class CouserRegController extends Controller
{
    public function register_course_user(Request $request){
    	$user = auth()->user();
    	$studentinfo = Studentinfo::where('user_id', $user->id)->first();

		$cademicyear = Academicyear::where('status', 1)->first();
		$academicyear = $cademicyear->acdemicyear;
		$academicsem =  $cademicyear->semester;

		$creg = Coureregistration::where('user_id', $user->id)
		->where('semester',$academicsem)
		->where('academic_year',$academicyear)->get();
		//$courses = 
    	//dd($cademicyear);

		//dd($creg);
    	return view('CourseRegistration.reg_course_student', ['course'=> $creg, 'academicyear' => $academicyear, 'semester'=>$academicsem, 'studentinfo'=>$studentinfo]);
    }



    public function register_course_user_now($prog,$currentlevel,$semester,$academicyear){


        #check if fee deadline has been met
        $getdeadline = Paymentdeadline::first();
        $date = $getdeadline->deadline;
        $diffs = now()->diffInDays(\Carbon\Carbon::parse($date),false);
        if ($diffs < 0) {
            return Redirect()->back()->with('error','Course Registration Date Elpased. Visit accounts to register course');
        }

    	//check if student has paid fess
        $fees = Studentfee::where('indexnumber',auth()->user()->indexnumber)->get();

        //dd($fees);

        #check semster 
        //get current academic year
        $cademicyear = Academicyear::where('status',1)->first();
        $academic = $cademicyear->acdemicyear;
        $semester = $cademicyear->semester;

       // dd($semester);

        if ($semester == 'First Semester') {
            #for first semester

            foreach ($fees as $row) {

                

                if ($row->fee == 'Undergraduate Fees' || $row->fee == 'Undergraduate Weekend Fee' || $row->fee == 'Undergraduate Evening Fee' || $row->fee == 'Undergraduate Diploma Fee' ) {

                    $amount = $row->feeamount;
                    $paid = $row->paid;
                    $left = $row->owed;



                    $half = ($amount/2);


                    if ($paid < $half || $half != $paid) {
                        
                        return Redirect()->back()->with('error','Please Make sure, all financial obligations are met to proceed!');
                    }

                }



            }

        }else{
            #for second semester
            $feessum = Studentfee::where('indexnumber',auth()->user()->indexnumber)->sum('owed');

            if (1 > $feessum) {
                
            }else{

                 return Redirect()->back()->with('error','Please Make sure, all financial obligations are met to proceed!');
            }
        }
       

    	//echo $prog.$currentlevel.$semester.$academicyear;

    	//get couses from Programmes and their course
    	$Progcouse = Programmecourse::where('programme',$prog)
    	->where('level',$currentlevel)->where('semester', $semester)->get();

    	//curent user
    	$userid = auth()->user()->id;
    	$indexnumber = auth()->user()->indexnumber;
    	$countcourse = $Progcouse->count();


    	foreach($Progcouse as $courses){
    		$code = $courses->coursecode;
    		$codetittle =  $courses->coursetitle;
    		$credithours = $courses->credithours;

    		$data = [
    			'user_id'=> $userid,
    			'indexnumber' => $indexnumber,
    			'cource_code'=> $code,
                'level'=>$currentlevel,
    			'cource_title'=> $codetittle,
    			'credithours'=> $credithours,
    			'semester'=> $semester,
    			'academic_year'=> $academicyear
    		];

    		$cousereg = new Coureregistration($data);
    		$cousereg->save();
    	}
    	

        //add semester record into the database

        $regdata = [
            'user_id'=> $userid,
            'semester'=> $semester,
            'academicyear'=> $academicyear
        ];

        $userreg = new Regacademicyear($regdata);
        $userreg->save();


    	return Redirect()->back()->with('message','Couses Registered Successfully');

    }



    public function print_course_user($prog,$currentlevel,$semester,$academicyear){
    	$cousereg = Coureregistration::where('semester',$semester)
    	->where('academic_year',$academicyear)
    	->where('user_id', auth()->user()->id)->get();

    	$studentinfo = Studentinfo::where('user_id', auth()->user()->id)->first();
    	//dd($cousereg);
    	return view('CourseRegistration.prin_courses_reg', ['courses'=>$cousereg,'academicyear' => $academicyear, 'semester'=>$semester, 'studentinfo'=>$studentinfo]);

    }



public function results_display(){
        $user = auth()->user();
        $studentinfo = Studentinfo::where('user_id', $user->id)->first();
        
        // $cademicyear = Academicyear::where('status', 1)->first();
        // $academicyear = $cademicyear->acdemicyear;
        // $academicsem =  $cademicyear->semester;


        //dd($regs);

        $regsem = Regacademicyear::where('user_id',$user->id)->get();

        $creg = Coureregistration::where('user_id', $user->id)->get();

        $exresults = Examresults::where('user_id',$user->id)->get();

       //dd($exresults);

    return view('CourseRegistration.results_display',['course'=> $creg,'studentinfo'=>$studentinfo, 'regsem'=>$regsem, 'examsresults'=> $exresults]);
}


















}