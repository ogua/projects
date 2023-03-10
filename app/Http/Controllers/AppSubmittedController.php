<?php

namespace App\Http\Controllers;

use App\Academicyear;
use App\Applicationinfo;
use App\Guardianinfo;
use App\Notifications\Admissionapprove;
use App\Notifications\Disapproveddmission;
use App\Personalinfo;
use App\Programme;
use App\Result;
use App\Studentinfo;
use App\Supportingdoc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AppSubmittedController extends Controller
{
    

	public function index(){
		$person = Personalinfo::all();
        $appinfo = Applicationinfo::all();

		return view('admissionsubmitted.online_admission',
			[
            'personals' => $person,
            'appinfo' => $appinfo
        ]);
	}


	public function admission_all(){
		 $academicyear = Academicyear::where('status',1)->first();

		 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.approve','personalinfos.phone','personalinfos.profileimg', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('year', $academicyear->acdemicyear);

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                if ($user->approve == 1) {
         			 return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a> | <span class="badge badge-light">Approved</span';
         		}
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
	}


	public function admission_view($id){
		$person = Personalinfo::where('osncode_id', $id)->first();
        $appinfo = Applicationinfo::where('osncode_id', $id)->first();

        $result1 = Result::where('resulttype','result1')
            ->where('osncode_id',$id)->first();

        $result2 = Result::where('resulttype','result2')
            ->where('osncode_id',$id)->first();

        $result3 = Result::where('resulttype','result3')
            ->where('osncode_id',$id)->first();
		
		$gurdian = Guardianinfo::where('osncode_id',$id)->first();

		$support = Supportingdoc::where('osncode_id',$id)->get();

		return view('admissionsubmitted.admission_details_view', [
            'personal' => $person,
            'appinfo' => $appinfo,
            'result1' => $result1,
            'result2' => $result2,
            'result3' => $result3,
            'gurdian'=>$gurdian,
            'supportdoc' => $support
        ]);
	}


	public function admission_update_program(Request $Request){

		if ($Request->ajax()) {
			$id = $Request->post('cid');
			$prog = $Request->post('prog');


			//update programme duration,so get the programme
			$progs = Programme::where('name',$prog)->first();

			$appinfo = Applicationinfo::where('osncode_id',$id)->first();
			$appinfo->programme = $prog;
			$appinfo->duration = $progs->duration;
			$appinfo->type = $progs->type;
			$appinfo->save();


			$msg = "Programme Updated Successfully!";
      		return response()->json(array('msg'=> $msg), 200);
			
		}
	}



	public function admission_approve_admission(Request $Request){

		if ($Request->ajax()) {
			$id = $Request->post('cid');
			$adstus = $Request->post('status');

			$academic = Academicyear::where('status',1)->first();
			$appinfo = Applicationinfo::where('osncode_id',$id)->first();
			//check if post value is 1 0r 0
			if ($adstus == 1) {
				//value is 1
				if ($appinfo->programme != null) {
					if ($adstus == 1) {
						//approve 
						//check if approved
						$status = Personalinfo::where('approve', 1)
						->where('osncode_id', $id)->first();
						if ($status) {
							//admission approved
							$msg = "Admission Has Already been Approved!";
	      					return response()->json(array('msg'=> $msg), 200);
						}else{
							//approve it now
							$approve = Personalinfo::where('osncode_id', $id)->first();
							$approve->approve = 1;
							$approve->save();

							$appinfo = Applicationinfo::where('osncode_id', $id)->first();
							$gurdian = Guardianinfo::where('osncode_id', $id)->first();


							$fullname = $approve->surname." ".$approve->middlename." ".$approve->firstnames;
							$gender = $approve->gender;
							$dateofbirth = $approve->dateofbirth;
							$religion = $approve->religion;
							$denomination = $approve->denomination;
							$placeofbirth = $approve->placeofbirth;
							$nationality = $approve->nationality;
							$hometown = $approve->hometown;
							$region = $approve->region;
							$disability = $approve->disability;
							$postcode = $approve->postcode;
							$address = $approve->address;
							$email = $approve->email;
							$phone = $approve->phone;
							$maritalstutus = $approve->maritalstutus;
							$entrylevel = $appinfo->entrylevel;
							$session = $appinfo->session;
							$programme = $appinfo->programme;
							$currentlevel = $entrylevel;
							$indexnumber = $appinfo->indexnumber;
							$gurdianname = $gurdian->gurdianname;
							$relationshp = $gurdian->relationshp;
							$occupation = $gurdian->occupation;
							$mobile = $gurdian->mobile;
							$employed = $gurdian->employed;
							$status = 0;
							$type = $appinfo->type;

							$admitted = "AUG,".date('Y');
							$duration = $appinfo->duration;
							$endyear = date('Y') + $duration;

							

							//create user
							$user = User::create([
					            'name' => $fullname,
					            'email' => $email,
					            'indexnumber'=> $indexnumber,
					            'pro_pic'=> $approve->profileimg,
					            'password' => Hash::make($email),
					        ]);

							$data = [
								'fullname'=>$fullname,
								'gender'=>$gender,
								'dateofbirth'=>$dateofbirth,
								'religion'=>$religion,
								'denomination'=>$denomination,
								'placeofbirth'=>$placeofbirth,
								'nationality'=>$nationality,
								'hometown'=>$hometown,
								'region'=>$region,
								'disability'=>$disability,
								'postcode'=>$postcode,
								'address'=>$address,
								'email'=>$email,
								'phone'=>$phone,
								'maritalstutus'=>$maritalstutus,
								'entrylevel'=>$entrylevel,
								'session'=>$session,
								'programme'=>$programme,
								'type'=> $type,
								'currentlevel'=>$currentlevel,
								'indexnumber'=>$indexnumber,
								'gurdianname'=>$gurdianname,
								'relationship'=>$relationshp,
								'occupation'=>$occupation,
								'mobile' =>$mobile,
								'employed'=>$employed,
								'status'=> 0,
								'academic_year' => $academic->acdemicyear,
								'admitted' => $admitted,
								'completion'=> 'AUG,'.$endyear
							];

							$studentinfos = new Studentinfo($data);
							$user->studentinfos()->save($studentinfos);


							//send Email or text message to notify user of Admission Approved
							$user->notify(new Admissionapprove($fullname,$currentlevel,$programme,$session,$file));


							//send notification to use of admission approved
							$msg = "Admission Approved! Successfully";
	      					return response()->json(array('msg'=> $msg), 200);

						}

				}else{	
						//disapprove
					//check if there is a data here

					//disapprove admission
					$approve = Personalinfo::where('osncode_id', $id)->first();
					$approve->approve = 0;
					$approve->save();

					//delete user for database
					$appinfo = Applicationinfo::where('osncode_id', $id)->first();
					$user = User::where('indexnumber', $appinfo->indexnumber)->first();
					$user->delete();

					//delete student information as well
					$studentinfos = Studentinfo::where('indexnumber', $appinfo->indexnumber)->first();
					$studentinfos->delete();


					$fullname = $approve->surname.' '.$approve->middlename.' '.$approve->firstnames;

					$email = $approve->email;

					//notify user of revoked admission
					Notification::route('mail', $email)
                   ->notify(new Disapproveddmission($fullname));



					//notify user of disapproved success
					$msg = "Admission Revoked Successfully!";
	      			return response()->json(array('msg'=> $msg), 200);

				}
				
				}else{
					$msg = "Please Approve Programme Before Approving Admission Requests!";
	      			return response()->json(array('error'=> $msg), 200);
				}

			}else{
				//value is 0
				//check if there is a data here

					//disapprove admission
					$approve = Personalinfo::where('osncode_id', $id)->first();
					$approve->approve = 0;
					$approve->save();

					//delete user for database
					$appinfo = Applicationinfo::where('osncode_id', $id)->first();

					$user = User::where('indexnumber', $appinfo->indexnumber)->first();
					if ($user) {
						$user->delete();
					}
					
					//delete student information as well
					$studentinfos = Studentinfo::where('indexnumber', $appinfo->indexnumber)->first();
					if ($studentinfos) {
						$studentinfos->delete();
					}
					

					$fullname = $approve->surname.' '.$approve->middlename.' '.$approve->firstnames;

					$email = $approve->email;
					//notify user of revoked admission
					Notification::route('mail', $email)
                   ->notify(new Disapproveddmission($fullname));


					//notify user of disapproved success
					$msg = "Admission Revoked Successfully!";
	      			return response()->json(array('msg'=> $msg), 200);

			}


			
			
		}
	}



public function admission_all_level100(){

	return view('admissionsubmitted.online_admission_level_1');
}

public function admission_all_level1(){
	$academicyear = Academicyear::where('status',1)->first();
	 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.phone','personalinfos.profileimg','personalinfos.approve', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('year', $academicyear->acdemicyear)
            ->where('applicationinfos.entrylevel', 'Level 100');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
         		if ($user->approve == 1) {
         			 return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a> | <span class="badge badge-light">Approved</span';
         		}
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}



public function admission_all_level100_app(){

	return view('admissionsubmitted.online_admission_level1_app');
}

public function admission_all_level1_app(){
	$academicyear = Academicyear::where('status',1)->first();
	 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.phone','personalinfos.profileimg', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('approve', '1')
            ->where('year', $academicyear->acdemicyear)
            ->where('applicationinfos.entrylevel', 'Level 100');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}






//level 200


public function admission_all_level200(){

	return view('admissionsubmitted.online_admission_level_2');
}

public function admission_all_level2(){
	 $academicyear = Academicyear::where('status',1)->first();
	 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.phone','personalinfos.profileimg','personalinfos.approve', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('year', $academicyear->acdemicyear)
            ->where('applicationinfos.entrylevel', 'Level 200');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
         		if ($user->approve == 1) {
         			 return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a> | <span class="badge badge-light">Approved</span';
         		}
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}



public function admission_all_level200_app(){

	return view('admissionsubmitted.online_admission_level2_app');
}

public function admission_all_level2_app(){
	 $academicyear = Academicyear::where('status',1)->first();
	 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.phone','personalinfos.profileimg', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('approve', '1')
            ->where('year', $academicyear->acdemicyear)
            ->where('applicationinfos.entrylevel', 'Level 200');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}







//level 300





//level 200


public function admission_all_level300(){

	return view('admissionsubmitted.online_admission_level_3');
}

public function admission_all_level3(){
	$academicyear = Academicyear::where('status',1)->first();
	 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.phone','personalinfos.profileimg','personalinfos.approve', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('year', $academicyear->acdemicyear)
            ->where('applicationinfos.entrylevel', 'Level 300');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
         		if ($user->approve == 1) {
         			 return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a> | <span class="badge badge-light">Approved</span';
         		}
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}



public function admission_all_level300_app(){

	return view('admissionsubmitted.online_admission_level3_app');
}

public function admission_all_level3_app(){
	$academicyear = Academicyear::where('status',1)->first();
	 $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.phone','personalinfos.profileimg', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('approve', '1')
            ->where('year', $academicyear->acdemicyear)
            ->where('applicationinfos.entrylevel', 'Level 300');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}




//confirm student Admsission
public function admission_confirm(){
	return view('admissionsubmitted.admission_confirm');
}



public function admission_confirm_students(){
	  $academicyear = Academicyear::where('status',1)->first();
	  $peronalinfo = Personalinfo::join('applicationinfos', 'personalinfos.osncode_id', '=', 'applicationinfos.osncode_id')
            ->select(['personalinfos.id', 'personalinfos.osncode_id','personalinfos.firstnames','personalinfos.surname','personalinfos.middlename', 'personalinfos.gender','personalinfos.email', 'personalinfos.approve','personalinfos.phone','personalinfos.approved','personalinfos.profileimg', 'applicationinfos.entrylevel', 'applicationinfos.session','applicationinfos.indexnumber','applicationinfos.firstchoice','personalinfos.year','applicationinfos.secondchoice','applicationinfos.thirdchoice', 'applicationinfos.programme'])
            ->where('status','1')
            ->where('year', $academicyear->acdemicyear)
            ->where('approve', '1');

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                if ($user->approve == 1 && $user->approved == 1) {
         			 return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a> | <span class="badge badge-light">Confirmed</span>';
         		}
                return '<a href="/LatestAdmission/admission-all-view/'.$user->osncode_id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
          ->editColumn('firstnames', function ($model) {
                return $model->surname." ".$model->firstnames." ".$model->middlename;
            })
            ->make(true);
}


public function admission_confirm_students_now(Request $Request){
	$indexnumber = $Request->post('cid');
	$studentinfos = Studentinfo::where('indexnumber', $indexnumber)->first();
	if ($studentinfos) {
		$studentinfos->status = 1;
		//$studentinfos->admitted = 'Sat-Jun-2020 09:02:36';
		$studentinfos->save();


		$perso = Personalinfo::where('email', $studentinfos->email)->first();
		$perso->approved = 1;
		$perso->save();

		//add student role
		$user = User::where('indexnumber',$indexnumber)->first();
		$user->assignRole('Student');


		$msg = "Student Admission Confirmed Successfully!";
	    return response()->json(array('msg'=> $msg), 200);


	}

	$msg = "Something Went Wrong, Contact System Administrator";
	return response()->json(array('error'=> $msg), 200);
}



public function admission_confirm_letter($num){
	$studentinfos = Studentinfo::where('indexnumber', $num)->first();
	$user = User::where('indexnumber',$num)->first();
	return view('admissionsubmitted.admission_confirm_appointment', ['student'=> $studentinfos,'user'=>$user]);
}



public function admission_confirm_all(){
		$studentinfos = Studentinfo::where('status', 1)->get();
	return view('admissionsubmitted.admission_confirmed_all');
}


public function admission_confirm_all_data(){
	$academicyear = Academicyear::where('status',1)->first();
	$peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
	->select(
		['studentinfos.id', 'studentinfos.fullname', 'studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('status','1')
            ->where('academic_year', $academicyear->acdemicyear);

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/LatestAdmission/admission-all-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
            ->make(true);
}




public function admission_unconfirm_all(){
		$studentinfos = Studentinfo::where('status', 1)->get();
	return view('admissionsubmitted.admission_unconfirmed_all');
}


public function admission_unconfirm_all_data(){
	$academicyear = Academicyear::where('status',1)->first();
	$peronalinfo = Studentinfo::join('users','users.id', '=', 'studentinfos.user_id')
	->select(
		['studentinfos.id', 'studentinfos.fullname', 'studentinfos.gender', 'studentinfos.entrylevel', 'studentinfos.academic_year', 'users.pro_pic as profileimg', 'studentinfos.indexnumber','studentinfos.session', 'studentinfos.programme']) 
            ->where('status','0')
            ->where('academic_year', $academicyear->acdemicyear);

        return Datatables::of($peronalinfo)
         ->addColumn('action', function ($user) {
                return '<a href="/LatestAdmission/admission-all-view/'.$user->id.'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
            })
            ->make(true);
}











}

