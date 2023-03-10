<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Exam;
use App\ExamScore;
use App\Examcheck;
use App\Examretryresponse;
use App\Examtrack;
use App\Programme;
use App\QestionOption;
use App\Question;
use App\Studentexam;
use DB;
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    public function add_exams(){
    	$programm = Programme::all();
    	$exam = Exam::where('lecturer_id',auth()->user()->id)
    	->orderBy('id','Desc')->get();
    	return view('Exams.add_exams',['exams'=>$exam,'prog'=>$programm]);
    }

    public function save_exams(Request $request){

    	$this->validate($request,[
    		'examstitle'=> 'required',
    		'totalquestions'=> 'required',
    		'questiontoshow'=> 'required',
    		'rightanswermarks'=> 'required',
    		'wronganswermarks'=> 'required',
    		'timelimit'=> 'required',
    		'programme'=> 'required',
    		'coursecode'=> 'required',
    		'descexams'=> 'required',
    		'retry' => 'required'
    	]);


    	$data = [
    			'lecturer_id'=> auth()->user()->id,
    			'title'=>$request->input('examstitle'),
    			'totalquestion'=>$request->input('totalquestions'),
    			'questiontoshow'=>$request->input('questiontoshow'),
    			'mfr'=>$request->input('rightanswermarks'),
    			'mfw'=>$request->input('wronganswermarks'),
    			'minutes'=>$request->input('timelimit'),
    			'description'=>$request->input('descexams'),
    			'retry' => $request->input('retry'),
    			'programme'=>$request->input('programme'),
    			'coursecode'=>$request->input('coursecode')
    		];


    	$exams = new Exam($data);	

    	$exams->save();


    	return Redirect()->back()->with('message','Exams Added Successfully!');

    }


    public function all_exams(){
    	$exam = Exam::where('lecturer_id',auth()->user()->id)
    	->orderBy('id','Desc')->get();

    	return view('Exams.lec_view_exams',['exams'=>$exam]);
    }

    public function edit_exams($id){
    	$programm = Programme::all();
    	$exam = Exam::where('id',$id)->first();
    	//dd($exam);
    	return view('Exams.edit_exams',['exams'=>$exam,'prog'=>$programm]);
    }


    public function update_exams(Request $request){

    	$this->validate($request,[
    		'examstitle'=> 'required',
    		'totalquestions'=> 'required',
    		'questiontoshow'=> 'required',
    		'rightanswermarks'=> 'required',
    		'wronganswermarks'=> 'required',
    		'timelimit'=> 'required',
    		'programme'=> 'required',
    		'coursecode'=> 'required',
    		'descexams'=> 'required',
    		'retry' => 'required'
    	]);

    	$exam = Exam::where('id',$request->input('hiddenid'))->first();
    	$exam->title = $request->input('examstitle');
    	$exam->totalquestion = $request->input('totalquestions');
    	$exam->questiontoshow = $request->input('questiontoshow');
    	$exam->mfr = $request->input('rightanswermarks');
    	$exam->mfw = $request->input('wronganswermarks');
    	$exam->minutes = $request->input('timelimit');
    	$exam->description = $request->input('descexams');
    	$exam->retry = $request->input('retry');
    	$exam->programme = $request->input('programme');
    	$exam->coursecode = $request->input('coursecode');

    	$exam->save();


    	return Redirect()->route('all-exams')->with('message','Info Updated Successfully!');
    	
    }


public function add_questions($id){
	$exam = Exam::where('id',$id)->first();
	$examsid = $exam->id;
	$totalquestions = $exam->totalquestion;

	return view('Exams.add_questions',['examsid'=>$examsid,'totalquestions'=>$totalquestions]);

}


public function more_questions($quanty, $examid){
	return view('Exams.add_more_question',['examsid'=>$examid,'totalquestions'=>$quanty]);
}


public function save_questions(Request $request, $totalquestions){
	$examsid = $request->input('examsid');


	$validation_array = [];

	for ($i=1; $i <= $totalquestions; $i++) {

		$validation_array['qns'.$i] = 'required';
		$validation_array['optiona'.$i] = 'required';
		$validation_array['optionb'.$i] = 'required';
		$validation_array['optionc'.$i] = 'required';
		$validation_array['optiond'.$i] = 'required';
		$validation_array['ans'.$i] = 'required';
	}


	$this->validate($request,$validation_array);

	$more = $request->input('addmore');
	if ($more == 'addmore') {
		$exam = Exam::where('id',$examsid)->first();
		$totalq = $exam->totalquestion;
		$exam->totalquestion = $totalq + $totalquestions;
		$exam->save();
	}


	for ($i=1; $i <= $totalquestions; $i++) { 
		
		//add question
		$data = [
		'exam_id'=> $examsid,
		'question' =>  $request->input('qns'.$i),
		'qnumber' => $i
		];

	    $que = new Question($data);
	    $que->save();

	    $questionid = $que->id;


	    $optiona = ['question_id' =>  $questionid,
	              'option' => $request->input('optiona'.$i)
	    ];

	    $quesa = new QestionOption($optiona);
	    $quesa->save();


	    //optionb
	    $optionb = ['question_id' =>  $questionid,
	              'option' => $request->input('optionb'.$i)
	    ];

	    $quesb = new QestionOption($optionb);
	    $quesb->save();


	    //opbtion c
	    $optionc = ['question_id' =>  $questionid,
	              'option' => $request->input('optionc'.$i)
	    ];

	    $quesc = new QestionOption($optionc);
	    $quesc->save();



	    //option d
	    $optiond = ['question_id' =>  $questionid,
	              'option' => $request->input('optiond'.$i)
	    ];

	    $quesd = new QestionOption($optiond);
	    $quesd->save();


	    $answer = $request->input('ans'.$i);

	    if ($answer == 'a') {
	    	$opid = $quesa->id;
	    }

	    if ($answer == 'b') {
	    	$opid = $quesb->id;
	    }

	    if ($answer == 'c') {
	    	$opid = $quesc->id;
	    }

	    if ($answer == 'd') {
	    	$opid = $quesd->id;
	    }

		//answer
		$ans = ['alpha'=>$answer, 'exam_id'=> $examsid,'qestion_option_id' => $questionid,'answer'=> $opid ];
	    $answer = new Answer($ans);
	    $answer->save();

	}

	//check if eaxms exist
	    $checks = Examcheck::where('exam_id',$examsid)->first();
	    if ($checks) {
	    	
	    }else{
	    	$cdata = ['exam_id'=> $examsid];
	    	$scheck = new Examcheck($cdata);
	    	$scheck->save();
	    }

	
return Redirect()->route('add-exams')->with('message','Questions Addded Successfully!');

}


public function view_exams(){
    $exam = Exam::where('lecturer_id',auth()->user()->id)
    ->orderBy('id','Desc')->get();
    return view('Exams.view_exams',['exams'=>$exam]);
}



public function start_exams(){

	$exam = Exam::latest()->get();
	$exscore = ExamScore::where('user_id',auth()->user()->id)->get();
    return view('Exams.student_exams',['exams'=>$exam,'score'=>$exscore]);
}


public function start_exams_now($id){

	$exam = Exam::where('id',$id)->first();
	$examid = $exam->id;
	$examtot = $exam->questiontoshow;
	$examStatus = $exam->retry;
	$mins = $exam->minutes;



	//change it and apply changes Later 
	// No

	if ($examStatus == 'No') {
		//Add User Details To Exams Tracking
		//first check if this user exist
		$examtrack = Examtrack::where('user_id',auth()->user()->id)
		->where('exam_id',$examid)->first();
		if ($examtrack) {
			return Redirect()->back()->with('Message','Your Session has Expired!');
		}else{
			//add to exams tracking
			$data = ['user_id'=> auth()->user()->id,'exam_id'=>$examid];
			$track = new Examtrack($data);
			$track->save();
		}
	}



	$ques = Question::where('exam_id',$examid)
	->with('qestionOptions')
	->get()->shuffle()->take($examtot);


	//now insert the given question then fetch it back to the user
	$studex = Studentexam::where('user_id',auth()->user()->id)
	->where('exam_id',$examid)->get();

	if (!empty($studex)) {
		foreach ($studex as $studenteams) {
			$studenteams->delete();
		}
	}


	foreach ($ques as $row) {

		$data = [
			'question_id' => $row['id'],
			'exam_id' => $row['exam_id'],
			'user_id' => auth()->user()->id
		];

		$stueaxm = new Studentexam($data);
		$stueaxm->save();
	}


	return Redirect()->route('student_exams_start',
		['studentname'=> auth()->user()->name,
		'examid'=> $examid,
		'examtotal'=> $examtot,
		'mins'=> $mins]);

	
}



public function student_exams_start($studentname,$examid,$examtotal,$mins){
	//fetch exams from database
	$ques = Studentexam::where('user_id',auth()->user()->id)
	->where('exam_id',$examid)->get();

	return view('Exams.exams_start',['mins'=>$mins, 'questions'=>$ques,'examsid'=>$examid, 'examtot'=>$examtotal]);
}



public function submit_exams(Request $request){

	//dd($request);

	$total = $request->input('examtotal');
	$examid = $request->input('examsid');

	//cehck exmas if they should be a retry
	$exam = Exam::where('id',$examid)->first();
	$examStatus = $exam->retry;

	if ($examStatus == 'Yes') {
		$ereon = Examretryresponse::where('user_id',auth()->user()->id)->get();
		foreach ($ereon as $del) {
			$del->delete();
		}
		
	}

	//dd($request);

	for ($i=1; $i <= $total; $i++) {
		$ans = $request->input('ans'.$i);
		$quesid = $request->input('que'.$i);

		if ($examStatus == 'Yes') {
			//check answer
			$answers = Answer::where('qestion_option_id',$quesid)->first();
			$anss = $answers->answer;
			//dd($anss);
			if ($anss == $ans) {

				$cdata = ['user_id' => auth()->user()->id,
					'exam_id' => $examid,
					'question_id' => $quesid,
					'option_id' => $ans,
					'answer' => $answers->alpha,
					'status' => 'correct'];
				$respon = new Examretryresponse($cdata);
				$respon->save();

			}else{
				$wdata = ['user_id' =>auth()->user()->id,
					'exam_id' => $examid,
					'question_id' => $quesid,
					'option_id' => $ans,
					'answer' => $answers->alpha,
					'status' => 'wrong'];
				    $wrespon = new Examretryresponse($wdata);
				    $wrespon->save();
			}
		}else{
				$score = ExamScore::where('exam_id',$examid)
				->where('user_id',auth()->user()->id)->first();

				if ($score) {
					$cor = $score->score;
					//check the answer
					$answer = Answer::where('qestion_option_id',$quesid)->first();
					$anss = $answer->answer;
					if ($anss == $ans) {
					   $score->score = $cor + 1;
					   $score->save();
					}
				}else{
					//check answer
					$answer = Answer::where('qestion_option_id',$quesid)->first();
					$anss = $answer->answer;
					if ($anss == $ans) {

					    $data = ['exam_id'=>$examid,'user_id'=>auth()->user()->id,'score'=>'1'];
						$escor = new ExamScore($data);
						$escor->save();

					}else{

						$data = ['exam_id'=>$examid,'user_id'=>auth()->user()->id,'score'=>'0'];
						$escor = new ExamScore($data);
						$escor->save();
					}
				}
	    }

	}


	if ($examStatus == 'Yes') {
		//view Exmas Details and anser
	  return Redirect()->route('student-exam-retry-result',['id'=>$examid])->with('message','Try Examination Results');

	}
return Redirect()->route('start-exmas')->with('message','Examination Finished Successfully!');


}



public function view_exams_score($id){
	$exscore = ExamScore::where('exam_id',$id)->orderBy('score','Desc')->get();

	$user = DB::table('users')->where('indexnumber', 'like', '%GES%')->get();

    return view('Exams.view_exam_score',['score'=>$exscore,'user'=>$user]);
}



public function retry_exam_results($id){
	 $wrespon = Examretryresponse::where('user_id',auth()->user()->id)
	 ->where('exam_id',$id)->get();

	 //dd($wrespon);
	 return view('Exams.results_view',['examsresults'=>$wrespon]);
}



public function lect_exam_view($id){
  $exam = Exam::where('id',$id)->first();
	$examid = $exam->id;
	$examtot = $exam->totalquestion;


	$ques = Question::where('exam_id',$examid)
	->with('qestionOptions')
	->get()->shuffle();

	$anser = Answer::join('qestion_options','answers.answer','qestion_options.id')
	->where('exam_id',$examid)
	->get();

	//dd($anser);

	return view('Exams.lec_exam_view',['answer'=>$anser,'questions'=>$ques,'examsid'=>$examid, 'examtot'=>$examtot]);
}


public function lect_question_edit($id){
	$exam = Exam::where('id',$id)->first();
	$examsid = $exam->id;
	$totalquestions = $exam->totalquestion;

	$ques = Question::where('exam_id',$examsid)
	->with('qestionOptions')
	->get();


	$anser = Answer::join('qestion_options','answers.answer','qestion_options.id')
	->where('exam_id',$examsid)
	->get();


	return view('Exams.edit_question',['answer'=>$anser,'examsid'=>$examsid,'totalquestions'=>$totalquestions,'questions'=>$ques]);
}


public function update_questions(Request $request, $totalquestions){
	//dd($request);

	$validation_array = [];

	for ($i=1; $i <= $totalquestions; $i++) {

		$validation_array['qns'.$i] = 'required';
		$validation_array['optiona'.$i] = 'required';
		$validation_array['optionb'.$i] = 'required';
		$validation_array['optionc'.$i] = 'required';
		$validation_array['optiond'.$i] = 'required';
		$validation_array['ans'.$i] = 'required';
	}


	$this->validate($request,$validation_array);


	$examsid = $request->input('examsid');


	for ($i=1; $i <= $totalquestions; $i++) { 
		
		//add question
		$que = Question::where('exam_id',$examsid)
		->where('qnumber',$i)->first();
		$que->question = $request->input('qns'.$i);
	    $que->save();

	    $questionid = $que->id;

	    //option a update
	    $quesa = QestionOption::where('id',$request->input('aid'.$i))->first();
	    $quesa->option = $request->input('optiona'.$i);
	    $quesa->save();


	     //option b update
	    $quesb = QestionOption::where('id',$request->input('bid'.$i))->first();
	    $quesb->option = $request->input('optionb'.$i);
	    $quesb->save();

	     //option c update
	    $quesc = QestionOption::where('id',$request->input('cid'.$i))->first();
	    $quesc->option = $request->input('optionc'.$i);
	    $quesc->save();


	     //option d update
	    $quesd = QestionOption::where('id',$request->input('did'.$i))->first();
	    $quesd->option = $request->input('optiond'.$i);
	    $quesd->save();


	    $answer = $request->input('ans'.$i);

	    if ($answer == 'a') {
	    	$opid = $quesa->id;
	    }

	    if ($answer == 'b') {
	    	$opid = $quesb->id;
	    }

	    if ($answer == 'c') {
	    	$opid = $quesc->id;
	    }

	    if ($answer == 'd') {
	    	$opid = $quesd->id;
	    }

		//answer update
		$answers = Answer::where('qestion_option_id',$questionid)->first();
		$answers->answer = $opid;
		$answers->alpha = $answer;
	    $answers->save();

	}


	return Redirect()->back()->with('message','Questions Updated Successfully!');


}













}
