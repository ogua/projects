<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Studentinfo;
use App\User;
use App\Regacademicyear;
use App\Examresults;
use App\Coureregistration;
use App\Assignment;
use App\Submission;
use DB;



class StudentsController extends Controller
{
    public function allstudents(){
    	return view('Allstudents.allstudents');
    }


public function allstudents_data(){
    $peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
    ->select(
        ['studentinfos.id', 'studentinfos.fullname', 'studentinfos.currentlevel', 'studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('status','1');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/Allstudents/student-information-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>
                ';
            })
            ->make(true);
                    


}



public function allstudentsl1(){
	return view('Allstudents.allstudentsl1');
}


public function allstudents_datal1(){

     $peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
    ->select(
        ['studentinfos.id', 'studentinfos.fullname', 'studentinfos.currentlevel','studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('currentlevel', 'Level 100')
            ->where('status','1');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/Allstudents/student-information-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>
                ';
            })
            ->make(true);

}






public function allstudentsl2(){
	return view('Allstudents.allstudentsl2');
}


public function allstudents_datal2(){
	 $peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
    ->select(
        ['studentinfos.id', 'studentinfos.fullname', 'studentinfos.currentlevel','studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('currentlevel', 'Level 200')
            ->where('status','1');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/Allstudents/student-information-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>
                ';
            })
            ->make(true);
}






public function allstudentsl3(){
	return view('Allstudents.allstudentsl3');
}


public function allstudents_datal3(){


	 $peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
    ->select(
        ['studentinfos.id', 'studentinfos.fullname', 'studentinfos.currentlevel','studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('currentlevel', 'Level 300')
            ->where('status','1');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/Allstudents/student-information-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>
                ';
            })
            ->make(true);
}







public function allstudentsl4(){
	return view('Allstudents.allstudentsl4');
}


public function allstudents_datal4(){
	 $peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
    ->select(
        ['studentinfos.id', 'studentinfos.fullname', 'studentinfos.currentlevel','studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('currentlevel', 'Level 100')
            ->where('status','1');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/Allstudents/student-information-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>
                ';
            })
            ->make(true);
}




public function studentinfo_view($id){

    $peronalinfo = User::join('studentinfos','users.id', '=', 'studentinfos.user_id')
    ->where('studentinfos.id',$id)->first();

     //dd($peronalinfo);


        $regsem = Regacademicyear::where('user_id',$peronalinfo->user_id)->get();

        $creg = Coureregistration::where('user_id', $peronalinfo->user_id)->get();

        $exresults = Examresults::where('user_id',$peronalinfo->user_id)->get();  


        //dd($creg);    

    return view('Allstudents.student_info', ['personal' => $peronalinfo,'course'=> $creg, 'regsem'=>$regsem, 'examsresults'=> $exresults]);
}



public function studentinfo_profileview(){
     $id = auth()->user()->id;
     $peronalinfo = User::join('studentinfos','users.id', '=', 'studentinfos.user_id')
    ->where('users.id',$id)->first();

     //dd($peronalinfo);


        $regsem = Regacademicyear::where('user_id',$peronalinfo->user_id)->get();

        $creg = Coureregistration::where('user_id', $peronalinfo->user_id)->get();

        $exresults = Examresults::where('user_id',$peronalinfo->user_id)->get();  


        //dd($creg);    

    return view('Allstudents.student_profile', ['personal' => $peronalinfo,'course'=> $creg, 'regsem'=>$regsem, 'examsresults'=> $exresults]);

}



public function student_assignments(){
     //$assingment = DB::table('assignments')->orderBy('id','Desc')->get();
    $assingment = Assignment::latest()->get();

  //dd($assingment);
  return view('Allstudents.assignment_view',['assingment'=> $assingment]);
}



public function student_assignment_view($id){
       $assingment = Assignment::where('id',$id)->first(); 

       $sub = Submission::where('assignment_id',$id)->where('studentid',auth()->user()->indexnumber)->count();

       //dd($sub);

       $diffs = now()->diffInDays(\Carbon\Carbon::parse($assingment->subenddate),false);
       //dd($diffs);

      return view('Allstudents.submit_assignment',['assignmentid'=> $id, 'row'=> $assingment, 'elapse'=> $diffs,'subs'=> $sub]);
}



public function student_assignment_submit(Request $request){
    //dd($request);
    $this->validate($request,[
        'assingmentdoc'=>'required|mimes:pdf,docx'
    ]);


    $data = [
        'assignment_id'=>$request->input('assignmentid'),
        'studentid'=>$request->input('stuid'),
        'studentname'=>$request->input('stuname'),
        'studoc'=> $request->file('assingmentdoc')->store('Assignments','public')
    ];


    $sub = new Submission($data);
    $sub->save();


    return Redirect()->route('students-assignment-view',['id'=>$request->input('assignmentid')])->with('message','Assignment Submitted Successfully!');



}














}
