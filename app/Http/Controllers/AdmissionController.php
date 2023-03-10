<?php

namespace App\Http\Controllers;

use App\Academicyear;
use App\Applicationinfo;
use App\Guardianinfo;
use App\Mail\Sendosncode as Osnmail;
use App\Notifications\AdmissionSubmitMail;
use App\Notifications\NewstudentMail;
use App\Notifications\SendOsncode;
use App\Osncode;
use App\Personalinfo;
use App\Programme;
use App\Result;
use App\School;
use App\Studentinfo;
use App\Supportingdoc;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.osncode');
    }



    public function purchase_osn(Request $request){

        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'oname'=>'required',
            'email'=>'required|email',
            'pnumber'=>'required',
            'prog'=>'required'
         ]);
        
        $amount = 0;

        if ($request->input('prog') == "Degree Programme") {
            $amount = 200;
        }else{
            $amount = 180;
        }


        $data = [
            'firstname'=>$request->input('fname'),
            'lastname'=>$request->input('lname'),
             'othernames'=>$request->input('oname'),
             'email'=>$request->input('email'),
             'phone'=>$request->input('pnumber'),
             'programme'=>$request->input('prog'),
             'amount'=>  $amount,
             'year'=>$request->input('pyear'),
        ];

        $osn = new Osncode($data);
        $osn->save();

        $lastid =  $osn->id;

        $session = $request->session()->put('lastid', $lastid);

        //dd($session);

        if ($osn) {
           return Redirect()->back()->with('message','Info Saved Successfully');
        }


    }



    public function osn_payment(Request $request){
         $session = $request->session()->get('lastid');
        //  dd($request);
        
        // exit();
        $osn = Osncode::find($session);
        // dd($osn);
        // exit();

        return view('web.osnpayment', ['osn'=>$osn]);
    }
   


    public function osn_code_gen(Request $request){

         $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $code = substr(str_shuffle($permitted_chars), 0, 18);

         $session = $request->session()->get('lastid');
         $osn = Osncode::find($session);
         $osn->code = $code;
         $osn->save();


         $fullname = $osn->lastname.' '.$osn->othernames.' '.$osn->firstname;
         $osncode = $osn->code;
         $email = $osn->email;
         $phone = $osn->phone;
         $prog = $osn->programme;



         /*
            send email after code sent. to the intended user
        */

         /*
            Mail Send here via notification
         */
          
           Notification::route('mail', $email)
             ->notify(new SendOsncode($fullname,$osncode,$email,$phone,$prog));
          


         /* Send mail now */
         // Mail::to($email)
         // ->cc('ogusesitsolutions@gmail.com')
         // ->send(new Osnmail($osncode));


         # return new Osnmail($osncode);


         return redirect()->route('online-admission-login')->with('message',"Please check your mail box for online serial number to proceed for the registration process.");
    }



    public function online_admission(Request $request){            
        return View('web.admission_login');
    }

    public function admission_loign(Request $request){
        
        $this->validate($request,[
                'osncode'=> 'required'
            ]);

        $code = $request->input('osncode');
        $osncode = Osncode::whereRaw("BINARY `code` = ?", [$code])->first();

        // dd($osncode);
        if ($osncode) {
            $request->session()->put('id', $osncode->id);
            $request->session()->put('code', $code);
            $request->session()->put('name', $osncode->lastname);
             return Redirect()->route('admission-personal-info');
        }else{
            return Redirect()->back()->with('message','OSN CODE DONT Exist!.');
        }
        
    }


    public function admission_personal_info(Request $request){
        $id = $request->session()->get('id');
        $progra = Personalinfo::where('osncode_id',$id)->first();
        // dd($progra);
        // exit();
        return view('web.admission_personal_info', ['info'=>$progra]);
    }


    public function save_per_info(Request $request){
        //get current academic year
        $academic = Academicyear::where('status',1)->first();


        $progra = Personalinfo::where('id','=',$request->session()->get('id'))->count();
        if ($progra > 0) {
            
$personalinfo = Personalinfo::where('osncode_id','=',$request->session()->get('id'))->first();
        $personalinfo->surname = $request->input('Sname');
            $personalinfo->middlename = $request->input('mname');
             $personalinfo->firstnames = $request->input('fname');
             $personalinfo->gender = $request->input('gender');
              $personalinfo->dateofbirth = $request->input('dateofb');
               $personalinfo->religion = $request->input('relig');
             $personalinfo->denomination = $request->input('denomina');
              $personalinfo->placeofbirth = $request->input('plofbir');
               $personalinfo->nationality = $request->input('national');
                $personalinfo->hometown = $request->input('hometwn');
                 $personalinfo->region = $request->input('region');
                  $personalinfo->disability = $request->input('disble');
                   $personalinfo->postcode = $request->input('pcode');
                    $personalinfo->address = $request->input('residnadd');
                     $personalinfo->email = $request->input('Email');
                      $personalinfo->phone = $request->input('Phone');
                       $personalinfo->maritalstutus = $request->input('mstatus');
                       $personalinfo->save();
        }else{

            //insert data
            $data = [
            'surname'=> $request->input('Sname'),
            'middlename'=> $request->input('mname'),
             'firstnames'=> $request->input('fname'),
             'gender'=> $request->input('gender'),
              'dateofbirth'=> $request->input('dateofb'),
               'religion'=> $request->input('relig'),
             'denomination'=> $request->input('denomina'),
              'placeofbirth'=> $request->input('plofbir'),
               'nationality'=> $request->input('national'),
                'hometown'=> $request->input('hometwn'),
                 'region'=> $request->input('region'),
                  'disability'=> $request->input('disble'),
                   'postcode'=> $request->input('pcode'),
                    'address'=> $request->input('residnadd'),
                     'email'=> $request->input('Email'),
                      'phone'=> $request->input('Phone'),
                      'year' => $academic->acdemicyear,
                       'maritalstutus'=> $request->input('mstatus'),
        ];


            $osdcode = Osncode::find($request->session()->get('id'));
            $personalinfo = new Personalinfo($data);
            $osdcode->personinfos()->save($personalinfo);
        }
    

        return Redirect()->route('admission-personal-results');
    }




    public function admission_personal_results(Request $request){
        $id = $request->session()->get('id');
        $result1 = Result::where('osncode_id',$id)
        ->where('resulttype','result1')->first();

         $result2 = Result::where('osncode_id',$id)
        ->where('resulttype','result2')->first();

        $result3 = Result::where('osncode_id',$id)
        ->where('resulttype','result3')->first();

        // dd($result1);
        // exit();
        return view('web.admission_results',[
            'result1'=>$result1,
            'result2'=>$result2,
            'result3'=>$result3
        ]);
    }



    public function save_results(Request $request){
        $grade1 = 0;
        $grade2 = 0;
        $grade3 = 0;
        $grade4 = 0;
        $grade5 = 0;
        $grade6 = 0;

        if ($request->input('subject1') == "") {
            
        }else{
            if ($request->input('grade1') == 'A') {
              $grade1 = 1;
            }else if($request->input('grade1') == 'B'){
              $grade1 = 2;
            }else if($request->input('grade1') == 'B1'){
                $grade1 = 2; 
            }else if($request->input('grade1') == 'B2'){
                 $grade1 = 2;
            }else if($request->input('grade1') == 'B3'){
                 $grade1 = 3;
            }else if($request->input('grade1') == 'C'){
                 $grade1 = 3;
            }else if($request->input('grade1') == 'C4'){
                 $grade1 = 4;
            }else if($request->input('grade1') == 'C5'){
                 $grade1 = 5;
            }else if($request->input('grade1') == 'C6'){
                 $grade1 = 6;
            }else if($request->input('grade1') == 'D'){
                 $grade1 = 7;
            }
        }




        if ($request->input('subject2') == "") {
            
        }else{
            if ($request->input('grade2') == 'A') {
              $grade2 = 1;
            }else if($request->input('grade2') == 'B'){
              $grade2 = 2;
            }else if($request->input('grade2') == 'B1'){
                $grade2 = 2; 
            }else if($request->input('grade2') == 'B2'){
                 $grade2 = 2;
            }else if($request->input('grade2') == 'B3'){
                 $grade2 = 3;
            }else if($request->input('grade2') == 'C'){
                 $grade2 = 3;
            }else if($request->input('grade2') == 'C4'){
                 $grade2 = 4;
            }else if($request->input('grade2') == 'C5'){
                 $grade2 = 5;
            }else if($request->input('grade2') == 'C6'){
                 $grade2 = 6;
            }else if($request->input('grade2') == 'D'){
                 $grade2 = 7;
            }

            
        }



        if ($request->input('subject3') == "") {
            
        }else{
            if ($request->input('grade3') == 'A') {
              $grade3 = 1;
            }else if($request->input('grade3') == 'B'){
              $grade3 = 2;
            }else if($request->input('grade3') == 'B1'){
                $grade3 = 2; 
            }else if($request->input('grade3') == 'B2'){
                 $grade3 = 2;
            }else if($request->input('grade3') == 'B3'){
                 $grade3 = 3;
            }else if($request->input('grade3') == 'C'){
                 $grade3 = 3;
            }else if($request->input('grade3') == 'C4'){
                 $grade3 = 4;
            }else if($request->input('grade3') == 'C5'){
                 $grade3 = 5;
            }else if($request->input('grade3') == 'C6'){
                 $grade3 = 6;
            }else if($request->input('grade3') == 'D'){
                 $grade3 = 7;
            }
        }





        if ($request->input('subject4') == "") {
            
        }else{
            if ($request->input('grade4') == 'A') {
              $grade4 = 1;
            }else if($request->input('grade4') == 'B'){
              $grade4 = 2;
            }else if($request->input('grade4') == 'B1'){
                $grade4 = 2; 
            }else if($request->input('grade4') == 'B2'){
                 $grade4 = 2;
            }else if($request->input('grade4') == 'B3'){
                 $grade4 = 3;
            }else if($request->input('grade4') == 'C'){
                 $grade4 = 3;
            }else if($request->input('grade4') == 'C4'){
                 $grade4 = 4;
            }else if($request->input('grade4') == 'C5'){
                 $grade4 = 5;
            }else if($request->input('grade4') == 'C6'){
                 $grade4 = 6;
            }else if($request->input('grade4') == 'D'){
                 $grade4 = 7;
            }
        }




        if ($request->input('subject5') == "") {
            
        }else{
            if ($request->input('grade5') == 'A') {
              $grade5 = 1;
            }else if($request->input('grade5') == 'B'){
              $grade5 = 2;
            }else if($request->input('grade5') == 'B1'){
                $grade5 = 2; 
            }else if($request->input('grade5') == 'B2'){
                 $grade5 = 2;
            }else if($request->input('grade5') == 'B3'){
                 $grade5 = 3;
            }else if($request->input('grade5') == 'C'){
                 $grade5 = 3;
            }else if($request->input('grade5') == 'C4'){
                 $grade5 = 4;
            }else if($request->input('grade5') == 'C5'){
                 $grade5 = 5;
            }else if($request->input('grade5') == 'C6'){
                 $grade5 = 6;
            }else if($request->input('grade5') == 'D'){
                 $grade5 = 7;
            }
        }




        if ($request->input('subject6') == "") {
            
        }else{
            if ($request->input('grade6') == 'A') {
              $grade6 = 1;
            }else if($request->input('grade6') == 'B'){
              $grade6 = 2;
            }else if($request->input('grade6') == 'B1'){
                $grade6 = 2; 
            }else if($request->input('grade6') == 'B2'){
                 $grade6 = 2;
            }else if($request->input('grade6') == 'B3'){
                 $grade6 = 3;
            }else if($request->input('grade6') == 'C'){
                 $grade6 = 3;
            }else if($request->input('grade6') == 'C4'){
                 $grade6 = 4;
            }else if($request->input('grade6') == 'C5'){
                 $grade6 = 5;
            }else if($request->input('grade6') == 'C6'){
                 $grade6 = 6;
            }else if($request->input('grade6') == 'D'){
                 $grade6 = 7;
            }
        }



        $resul1 = Result::where('resulttype','=','result1')
        ->where('osncode_id',$request->session()->get('id'))->count();

       if ($resul1  > 0) {
          //update

            $results = Result::where('resulttype','result1')
            ->where('osncode_id',$request->session()->get('id'))->first();

            $results->resulttype= $request->input('result');
            $results->examtype= $request->input('extype');
            $results->examyear= $request->input('exyr');
            $results->indexnumber= $request->input('indexnember');
            $results->subject1= $request->input('subject1');
            $results->grade1= $request->input('grade1');
            $results->grad1=  $grade1;
            $results->subject2= $request->input('subject2');
            $results->grade2= $request->input('grade2');
            $results->grad2=  $grade2;
            $results->subject3= $request->input('subject3');
            $results->grade3= $request->input('grade3');
            $results->grad3=  $grade3;
            $results->subject4= $request->input('subject4');
            $results->grade4= $request->input('grade4');
            $results->grad4=  $grade4;
            $results->subject5= $request->input('subject5');
            $results->grade5= $request->input('grade5');
            $results->grad5=  $grade5;
            $results->subject6= $request->input('subject6');
            $results->grade6= $request->input('grade5');
            $results->grad6=  $grade6;
            $results->save();


       }else{
            //insert

             $data = [
                'resulttype'=>$request->input('result'),
                'examtype'=>$request->input('extype'),
                'examyear'=>$request->input('exyr'),
                'indexnumber'=>$request->input('indexnember'),
                'subject1'=>$request->input('subject1'),
                'grade1'=>$request->input('grade1'),
                'grad1' => $grade1,
                'subject2'=>$request->input('subject2'),
                'grade2'=>$request->input('grade2'),
                'grad2' =>$grade2,
                'subject3' =>$request->input('subject3'),
                'grade3' =>$request->input('grade3'),
                'grad3' =>$grade4,
                'subject4' =>$request->input('subject4'),
                'grade4' =>$request->input('grade4'),
                'grad4' => $grade4,
                'subject5' =>$request->input('subject5'),
                'grade5' =>$request->input('grade5'),
                'grad5' =>$grade5,
                'subject6' =>$request->input('subject6'),
                'grade6' =>$request->input('grade5'),
                'grad6' =>$grade6,
        ];

        

        $osdcode = Osncode::find($request->session()->get('id'));
        $result = new Result($data);
        $osdcode->saveresults()->save($result);

        
       }
       

        return Redirect()->route('admission-personal-results');


}






    public function save_results2(Request $request){

        $grade1 = 0;
        $grade2 = 0;
        $grade3 = 0;
        $grade4 = 0;
        $grade5 = 0;
        $grade6 = 0;

        if ($request->input('subject1') == "") {
            
        }else{
            if ($request->input('grade1') == 'A') {
              $grade1 = 1;
            }else if($request->input('grade1') == 'B'){
              $grade1 = 2;
            }else if($request->input('grade1') == 'B1'){
                $grade1 = 2; 
            }else if($request->input('grade1') == 'B2'){
                 $grade1 = 2;
            }else if($request->input('grade1') == 'B3'){
                 $grade1 = 3;
            }else if($request->input('grade1') == 'C'){
                 $grade1 = 3;
            }else if($request->input('grade1') == 'C4'){
                 $grade1 = 4;
            }else if($request->input('grade1') == 'C5'){
                 $grade1 = 5;
            }else if($request->input('grade1') == 'C6'){
                 $grade1 = 6;
            }else if($request->input('grade1') == 'D'){
                 $grade1 = 7;
            }
        }




        if ($request->input('subject2') == "") {
            
        }else{
            if ($request->input('grade2') == 'A') {
              $grade2 = 1;
            }else if($request->input('grade2') == 'B'){
              $grade2 = 2;
            }else if($request->input('grade2') == 'B1'){
                $grade2 = 2; 
            }else if($request->input('grade2') == 'B2'){
                 $grade2 = 2;
            }else if($request->input('grade2') == 'B3'){
                 $grade2 = 3;
            }else if($request->input('grade2') == 'C'){
                 $grade2 = 3;
            }else if($request->input('grade2') == 'C4'){
                 $grade2 = 4;
            }else if($request->input('grade2') == 'C5'){
                 $grade2 = 5;
            }else if($request->input('grade2') == 'C6'){
                 $grade2 = 6;
            }else if($request->input('grade2') == 'D'){
                 $grade2 = 7;
            }

            
        }



        if ($request->input('subject3') == "") {
            
        }else{
            if ($request->input('grade3') == 'A') {
              $grade3 = 1;
            }else if($request->input('grade3') == 'B'){
              $grade3 = 2;
            }else if($request->input('grade3') == 'B1'){
                $grade3 = 2; 
            }else if($request->input('grade3') == 'B2'){
                 $grade3 = 2;
            }else if($request->input('grade3') == 'B3'){
                 $grade3 = 3;
            }else if($request->input('grade3') == 'C'){
                 $grade3 = 3;
            }else if($request->input('grade3') == 'C4'){
                 $grade3 = 4;
            }else if($request->input('grade3') == 'C5'){
                 $grade3 = 5;
            }else if($request->input('grade3') == 'C6'){
                 $grade3 = 6;
            }else if($request->input('grade3') == 'D'){
                 $grade3 = 7;
            }
        }





        if ($request->input('subject4') == "") {
            
        }else{
            if ($request->input('grade4') == 'A') {
              $grade4 = 1;
            }else if($request->input('grade4') == 'B'){
              $grade4 = 2;
            }else if($request->input('grade4') == 'B1'){
                $grade4 = 2; 
            }else if($request->input('grade4') == 'B2'){
                 $grade4 = 2;
            }else if($request->input('grade4') == 'B3'){
                 $grade4 = 3;
            }else if($request->input('grade4') == 'C'){
                 $grade4 = 3;
            }else if($request->input('grade4') == 'C4'){
                 $grade4 = 4;
            }else if($request->input('grade4') == 'C5'){
                 $grade4 = 5;
            }else if($request->input('grade4') == 'C6'){
                 $grade4 = 6;
            }else if($request->input('grade4') == 'D'){
                 $grade4 = 7;
            }
        }




        if ($request->input('subject5') == "") {
            
        }else{
            if ($request->input('grade5') == 'A') {
              $grade5 = 1;
            }else if($request->input('grade5') == 'B'){
              $grade5 = 2;
            }else if($request->input('grade5') == 'B1'){
                $grade5 = 2; 
            }else if($request->input('grade5') == 'B2'){
                 $grade5 = 2;
            }else if($request->input('grade5') == 'B3'){
                 $grade5 = 3;
            }else if($request->input('grade5') == 'C'){
                 $grade5 = 3;
            }else if($request->input('grade5') == 'C4'){
                 $grade5 = 4;
            }else if($request->input('grade5') == 'C5'){
                 $grade5 = 5;
            }else if($request->input('grade5') == 'C6'){
                 $grade5 = 6;
            }else if($request->input('grade5') == 'D'){
                 $grade5 = 7;
            }
        }




        if ($request->input('subject6') == "") {
            
        }else{
            if ($request->input('grade6') == 'A') {
              $grade6 = 1;
            }else if($request->input('grade6') == 'B'){
              $grade6 = 2;
            }else if($request->input('grade6') == 'B1'){
                $grade6 = 2; 
            }else if($request->input('grade6') == 'B2'){
                 $grade6 = 2;
            }else if($request->input('grade6') == 'B3'){
                 $grade6 = 3;
            }else if($request->input('grade6') == 'C'){
                 $grade6 = 3;
            }else if($request->input('grade6') == 'C4'){
                 $grade6 = 4;
            }else if($request->input('grade6') == 'C5'){
                 $grade6 = 5;
            }else if($request->input('grade6') == 'C6'){
                 $grade6 = 6;
            }else if($request->input('grade6') == 'D'){
                 $grade6 = 7;
            }
        }


         $resul1 = Result::where('resulttype','result2')
            ->where('osncode_id',$request->session()->get('id'))->count();

         if ($resul1  > 0) {
          //update

            $results = Result::where('resulttype','result2')
            ->where('osncode_id',$request->session()->get('id'))->first();

            $results->resulttype= $request->input('result');
            $results->examtype= $request->input('extype');
            $results->examyear= $request->input('exyr');
            $results->indexnumber= $request->input('indexnember');
            $results->subject1= $request->input('subject1');
            $results->grade1= $request->input('grade1');
            $results->grad1=  $grade1;
            $results->subject2= $request->input('subject2');
            $results->grade2= $request->input('grade2');
            $results->grad2=  $grade2;
            $results->subject3= $request->input('subject3');
            $results->grade3= $request->input('grade3');
            $results->grad3=  $grade4;
            $results->subject4= $request->input('subject4');
            $results->grade4= $request->input('grade4');
            $results->grad4=  $grade4;
            $results->subject5= $request->input('subject5');
            $results->grade5= $request->input('grade5');
            $results->grad5=  $grade5;
            $results->subject6= $request->input('subject6');
            $results->grade6= $request->input('grade5');
            $results->grad6=  $grade6;
            $results->save();


       }else{
            //insert

             $data = [
                'resulttype'=>$request->input('result'),
                'examtype'=>$request->input('extype'),
                'examyear'=>$request->input('exyr'),
                'indexnumber'=>$request->input('indexnember'),
                'subject1'=>$request->input('subject1'),
                'grade1'=>$request->input('grade1'),
                'grad1' => $grade1,
                'subject2'=>$request->input('subject2'),
                'grade2'=>$request->input('grade2'),
                'grad2' =>$grade2,
                'subject3' =>$request->input('subject3'),
                'grade3' =>$request->input('grade3'),
                'grad3' =>$grade4,
                'subject4' =>$request->input('subject4'),
                'grade4' =>$request->input('grade4'),
                'grad4' => $grade4,
                'subject5' =>$request->input('subject5'),
                'grade5' =>$request->input('grade5'),
                'grad5' =>$grade5,
                'subject6' =>$request->input('subject6'),
                'grade6' =>$request->input('grade5'),
                'grad6' =>$grade6,
        ];

        

        $osdcode = Osncode::find($request->session()->get('id'));
        $result = new Result($data);
        $osdcode->saveresults()->save($result);

        
       }
       

        return Redirect()->route('admission-personal-results');


}

    


public function save_results3(Request $request){
        $grade1 = 0;
        $grade2 = 0;
        $grade3 = 0;
        $grade4 = 0;
        $grade5 = 0;
        $grade6 = 0;

        if ($request->input('subject1') == "") {
            
        }else{
            if ($request->input('grade1') == 'A') {
              $grade1 = 1;
            }else if($request->input('grade1') == 'B'){
              $grade1 = 2;
            }else if($request->input('grade1') == 'B1'){
                $grade1 = 2; 
            }else if($request->input('grade1') == 'B2'){
                 $grade1 = 2;
            }else if($request->input('grade1') == 'B3'){
                 $grade1 = 3;
            }else if($request->input('grade1') == 'C'){
                 $grade1 = 3;
            }else if($request->input('grade1') == 'C4'){
                 $grade1 = 4;
            }else if($request->input('grade1') == 'C5'){
                 $grade1 = 5;
            }else if($request->input('grade1') == 'C6'){
                 $grade1 = 6;
            }else if($request->input('grade1') == 'D'){
                 $grade1 = 7;
            }
        }




        if ($request->input('subject2') == "") {
            
        }else{
            if ($request->input('grade2') == 'A') {
              $grade2 = 1;
            }else if($request->input('grade2') == 'B'){
              $grade2 = 2;
            }else if($request->input('grade2') == 'B1'){
                $grade2 = 2; 
            }else if($request->input('grade2') == 'B2'){
                 $grade2 = 2;
            }else if($request->input('grade2') == 'B3'){
                 $grade2 = 3;
            }else if($request->input('grade2') == 'C'){
                 $grade2 = 3;
            }else if($request->input('grade2') == 'C4'){
                 $grade2 = 4;
            }else if($request->input('grade2') == 'C5'){
                 $grade2 = 5;
            }else if($request->input('grade2') == 'C6'){
                 $grade2 = 6;
            }else if($request->input('grade2') == 'D'){
                 $grade2 = 7;
            }

            
        }



        if ($request->input('subject3') == "") {
            
        }else{
            if ($request->input('grade3') == 'A') {
              $grade3 = 1;
            }else if($request->input('grade3') == 'B'){
              $grade3 = 2;
            }else if($request->input('grade3') == 'B1'){
                $grade3 = 2; 
            }else if($request->input('grade3') == 'B2'){
                 $grade3 = 2;
            }else if($request->input('grade3') == 'B3'){
                 $grade3 = 3;
            }else if($request->input('grade3') == 'C'){
                 $grade3 = 3;
            }else if($request->input('grade3') == 'C4'){
                 $grade3 = 4;
            }else if($request->input('grade3') == 'C5'){
                 $grade3 = 5;
            }else if($request->input('grade3') == 'C6'){
                 $grade3 = 6;
            }else if($request->input('grade3') == 'D'){
                 $grade3 = 7;
            }
        }





        if ($request->input('subject4') == "") {
            
        }else{
            if ($request->input('grade4') == 'A') {
              $grade4 = 1;
            }else if($request->input('grade4') == 'B'){
              $grade4 = 2;
            }else if($request->input('grade4') == 'B1'){
                $grade4 = 2; 
            }else if($request->input('grade4') == 'B2'){
                 $grade4 = 2;
            }else if($request->input('grade4') == 'B3'){
                 $grade4 = 3;
            }else if($request->input('grade4') == 'C'){
                 $grade4 = 3;
            }else if($request->input('grade4') == 'C4'){
                 $grade4 = 4;
            }else if($request->input('grade4') == 'C5'){
                 $grade4 = 5;
            }else if($request->input('grade4') == 'C6'){
                 $grade4 = 6;
            }else if($request->input('grade4') == 'D'){
                 $grade4 = 7;
            }
        }




        if ($request->input('subject5') == "") {
            
        }else{
            if ($request->input('grade5') == 'A') {
              $grade5 = 1;
            }else if($request->input('grade5') == 'B'){
              $grade5 = 2;
            }else if($request->input('grade5') == 'B1'){
                $grade5 = 2; 
            }else if($request->input('grade5') == 'B2'){
                 $grade5 = 2;
            }else if($request->input('grade5') == 'B3'){
                 $grade5 = 3;
            }else if($request->input('grade5') == 'C'){
                 $grade5 = 3;
            }else if($request->input('grade5') == 'C4'){
                 $grade5 = 4;
            }else if($request->input('grade5') == 'C5'){
                 $grade5 = 5;
            }else if($request->input('grade5') == 'C6'){
                 $grade5 = 6;
            }else if($request->input('grade5') == 'D'){
                 $grade5 = 7;
            }
        }




        if ($request->input('subject6') == "") {
            
        }else{
            if ($request->input('grade6') == 'A') {
              $grade6 = 1;
            }else if($request->input('grade6') == 'B'){
              $grade6 = 2;
            }else if($request->input('grade6') == 'B1'){
                $grade6 = 2; 
            }else if($request->input('grade6') == 'B2'){
                 $grade6 = 2;
            }else if($request->input('grade6') == 'B3'){
                 $grade6 = 3;
            }else if($request->input('grade6') == 'C'){
                 $grade6 = 3;
            }else if($request->input('grade6') == 'C4'){
                 $grade6 = 4;
            }else if($request->input('grade6') == 'C5'){
                 $grade6 = 5;
            }else if($request->input('grade6') == 'C6'){
                 $grade6 = 6;
            }else if($request->input('grade6') == 'D'){
                 $grade6 = 7;
            }
        }



        $resul1 = Result::where('resulttype','result3')
            ->where('osncode_id',$request->session()->get('id'))->count();

       if ($resul1  > 0) {
          //update

            $results = Result::where('resulttype','result3')
            ->where('osncode_id',$request->session()->get('id'))->first();

            $results->resulttype= $request->input('result');
            $results->examtype= $request->input('extype');
            $results->examyear= $request->input('exyr');
            $results->indexnumber= $request->input('indexnember');
            $results->subject1= $request->input('subject1');
            $results->grade1= $request->input('grade1');
            $results->grad1=  $grade1;
            $results->subject2= $request->input('subject2');
            $results->grade2= $request->input('grade2');
            $results->grad2=  $grade2;
            $results->subject3= $request->input('subject3');
            $results->grade3= $request->input('grade3');
            $results->grad3=  $grade4;
            $results->subject4= $request->input('subject4');
            $results->grade4= $request->input('grade4');
            $results->grad4=  $grade4;
            $results->subject5= $request->input('subject5');
            $results->grade5= $request->input('grade5');
            $results->grad5=  $grade5;
            $results->subject6= $request->input('subject6');
            $results->grade6= $request->input('grade5');
            $results->grad6=  $grade6;
            $results->save();


       }else{
            //insert

             $data = [
                'resulttype'=>$request->input('result'),
                'examtype'=>$request->input('extype'),
                'examyear'=>$request->input('exyr'),
                'indexnumber'=>$request->input('indexnember'),
                'subject1'=>$request->input('subject1'),
                'grade1'=>$request->input('grade1'),
                'grad1' => $grade1,
                'subject2'=>$request->input('subject2'),
                'grade2'=>$request->input('grade2'),
                'grad2' =>$grade2,
                'subject3' =>$request->input('subject3'),
                'grade3' =>$request->input('grade3'),
                'grad3' =>$grade4,
                'subject4' =>$request->input('subject4'),
                'grade4' =>$request->input('grade4'),
                'grad4' => $grade4,
                'subject5' =>$request->input('subject5'),
                'grade5' =>$request->input('grade5'),
                'grad5' =>$grade5,
                'subject6' =>$request->input('subject6'),
                'grade6' =>$request->input('grade5'),
                'grad6' =>$grade6,
        ];

        // print_r($data);

        // exit();

        $osdcode = Osncode::find($request->session()->get('id'));
        $result = new Result($data);
        $osdcode->saveresults()->save($result);

        
       }
       // DB::enableQuerylog();
       // dd(DB::getQuerylog());

       // exit();

        return Redirect()->route('admission-personal-results');


}



    public function admission_personal_school(Request $request){
        $id = $request->session()->get('id');
        $school = School::where('osncode_id',$id)->first();
        // dd($school);
        // exit();

        return view('web.admission_school', ['school'=>$school]);
        
    }

     public function admission_personal_school_save(Request $request){
        
       $school = School::where('osncode_id', $request->session()->get('id'))->count();

       if ($school > 0) {
           //update
            $schoolattneded = School::where('osncode_id', $request->session()->get('id'))->first();
            $schoolattneded->name = $request->input('iname1');
            $schoolattneded->schstart = $request->input('stdate1');
            $schoolattneded->schend = $request->input('eddate1');
            $schoolattneded->name2 = $request->input('iname2');
            $schoolattneded->schstart2 = $request->input('stdate2');
            $schoolattneded->schend2 = $request->input('eddate2');
            $schoolattneded->save();
       }else{
         //insert
            $data = [
                'name' => $request->input('iname1'),
                'schstart' => $request->input('stdate1'),
                'schend' => $request->input('eddate1'),
                'name2' => $request->input('iname2'),
                'schstart2' => $request->input('stdate2'),
                'schend2' => $request->input('eddate2')
           ];

            $osdcode = Osncode::find($request->session()->get('id'));
            $schoolattneded = new School($data);
            $osdcode->schools()->save($schoolattneded);
       }

        return Redirect()->route('admission-app-info');

    }

    

    public function admission_app_info(Request $request){
        $id = $request->session()->get('id');
        $appinfo = Applicationinfo::where('osncode_id',$id)->first();
        $prog = Programme::all();
        return view('web.admisssion_appliactioninfo', [
            'prog'=>$prog,
            'appinfo'=> $appinfo
        ]);
    }



    public function admission_app_info_save(Request $request){
    
    $admision = Applicationinfo::where('osncode_id', $request->session()->get('id'))->count();

    if ($admision > 0) {
        # update
        $appinfo = Applicationinfo::where('osncode_id', $request->session()->get('id'))->first();
        $appinfo->session = $request->input('session');
        $appinfo->entrylevel = $request->input('entry');
        $appinfo->firstchoice = $request->input('fcchoice');
        $appinfo->secondchoice = $request->input('sndchoice');
        $appinfo->thirdchoice = $request->input('thrdchoice');
        $appinfo->indexnumber = $request->input('index1');
        $appinfo->save();
    }else{
        # insert
            function generateindexid($limit){
                $code = "GES";

                for ($i=0; $i < $limit; $i++) { 
                    $code .= mt_rand(0,9);
                }

                return $code;
            }
            
        // $indexnumber = generateindexid(9);

        // dd($indexnumber);
        // exit();

        $data = [
            'session' => $request->input('session'),
            'entrylevel'=> $request->input('entry'),
            'firstchoice'  => $request->input('fcchoice'),
            'secondchoice'  => $request->input('sndchoice'),
            'thirdchoice'  => $request->input('thrdchoice') ,
            'indexnumber'  => generateindexid(5)
        ];

        $osdcode = Osncode::find($request->session()->get('id'));
        $appinfo = new Applicationinfo($data);
        $osdcode->appinfomations()->save($appinfo);
    }

        return Redirect()->route('admission-guidian-info');

    }
    //admission-app-info

    public function admission_guidian_info(Request $request){
         $id = $request->session()->get('id');
        $gurinfo = Guardianinfo::where('osncode_id',$id)->first();
        return view('web.admission_gurdian', ['gurinfo'=>$gurinfo]);
    }


    public function admission_guid_save(Request $request){
    $guidian = Guardianinfo::where('osncode_id', $request->session()->get('id'))->count();

    if ($guidian > 0) {
        # update
        $gurinfo = Guardianinfo::where('osncode_id', $request->session()->get('id'))->first();
        $gurinfo->gurdianname = $request->input('gurname');
        $gurinfo->relationshp = $request->input('gurrela');
        $gurinfo->occupation = $request->input('guroccu');
        $gurinfo->mobile = $request->input('gurmob');
        $gurinfo->employed = $request->input('emplued');
        $gurinfo->save();

    }else{
        //insert
        $data = [
            'gurdianname' =>$request->input('gurname'),
            'relationshp' =>$request->input('gurrela'),
            'occupation' =>$request->input('guroccu'),
            'mobile' =>$request->input('gurmob') ,
            'employed' =>$request->input('emplued')
        ];

        $osdcode = Osncode::find($request->session()->get('id'));
        $gurinfo = new Guardianinfo($data);
        $osdcode->gurdianinfos()->save($gurinfo);
    }
        

        return Redirect()->route('admission-sup-doc');
    }


    public function admission_sup_doc(Request $request){
        $suportdoc = Supportingdoc::where('osncode_id',$request->session()->get('id'))->get();

        // dd($suportdoc);
        // exit();
        return view('web.admission_sup_doc', ['supportdoc'=>$suportdoc]);
    }


    public function admission_sup_doc_save(Request $request){
        $fillname = pathinfo($request->file('fileToUpload')->getClientOriginalName(), PATHINFO_FILENAME);


        //insert
        $data = [
            'doctype' =>$request->input('doctype'),
            'filename'=> $fillname
        ];


        $osdcode = Osncode::find($request->session()->get('id'));
        $suportdoc = new Supportingdoc($data);

        $osdcode->supportdocs()->save($suportdoc);

        if ($request->has('fileToUpload')) {
            # code...
            // $suportdoc->name = $request->file('fileToUpload')->store('supportdoc','public');
            // $suportdoc->save();

            //or
            $data = [
                'name' => $request->file('fileToUpload')->store('supportdoc','public')
            ];
            $suportdoc->update($data);
        }
        


        return Redirect()->back();
        // route('admission-sup-doc');
    }



    public function admission_sup_doc_delete($id){
        $suportdoc = Supportingdoc::find($id)->first();

        $name = $suportdoc->name;

        // dd($name);
        // exit();

        //delete Document First
        $storage= Storage::disk('public')->delete($name); 
        // $storage = Storage::delete($name);
        //delete form database;
        if ($storage) {
            $suportdoc->delete();
        }
    

        return Redirect()->back();
    }

    public function admission_profile_image(Request $request){
        $id = $request->session()->get('id');
        $person = Personalinfo::where('osncode_id', $id)->first();

        if ($person) {
            return view('web.admission_upload_pic', ['profile'=>$person]);
        }

        return Redirect()->back();
        
    }

    public function admission_submit_img(Request $request){
        $id = $request->session()->get('id');
        $person = Personalinfo::where('osncode_id', $id)->first();

        if ($person->profileimg) {
           //delete previous image then update

            //delete previous img
            $img = $person->profileimg;
            $storage= Storage::disk('public')->delete($img); 
            if ($storage) {

                //now update image
                $person->profileimg = $request->file('fileToUpload')->store('profile_img','public');
                $person->save();
            }
        }else{
            //update only
            $person->profileimg = $request->file('fileToUpload')->store('profile_img','public');
            $person->save();
        }


        return Redirect()->back();
    }


    public function submit_appliaction($id){
        // echo $id;
        $progra = Personalinfo::where('id',$id)->first();
        //dd($progra);
        $progra->status = 1;
        $progra->save();


        //SEND MAIL TO NOTIFY USER OF ADMISSION COMPLESSION

        $email = $progra->email;
        $fullname = $progra->surname.' '.$progra->firstnames.' '.$progra->middlename;

        //END MAIL HERE
        Notification::route('mail', $email)
             ->notify(new AdmissionSubmitMail($fullname));

        return Redirect()->route('admission-completed');
    }



    public function user_logout(){
        session()->forget('id');
        session()->forget('code');
        session()->forget('name');

        return Redirect()->route('online-admission-login');
    }


    public function adm_complete(Request $request){
        $id = $request->session()->get('id');
        $person = Personalinfo::where('osncode_id', $id)->first();
        $appinfo = Applicationinfo::where('osncode_id', $id)->first();

        return view('web.admission_completed', [
            'personal' => $person,
            'appinfo' => $appinfo]);
    }

    public function adm_complete_print(Request $request){
        $id = $request->session()->get('id');
        $person = Personalinfo::where('osncode_id', $id)->first();
        $appinfo = Applicationinfo::where('osncode_id', $id)->first();

        $result1 = Result::where('resulttype','result1')
            ->where('osncode_id',$id)->first();

        $result2 = Result::where('resulttype','result2')
            ->where('osncode_id',$id)->first();

        $result3 = Result::where('resulttype','result3')
            ->where('osncode_id',$id)->first();

        return view('web.admission_print', [
            'personal' => $person,
            'appinfo' => $appinfo,
            'result1' => $result1,
            'result2' => $result2,
            'result3' => $result3
        ]);
    }



    public function newStudent(){
        $prog = Programme::all();
        return view('admissionsubmitted.new_student_reg',['prog'=>$prog]);
    }



    public function newStudent_register(Request $request){
        $academic = Academicyear::where('status',1)->first();

        //dd($request);
        $this->validate($request,[
            'fullname'=>'required',
            'gender'=>'required',
            'dateofbirth'=>'required',
            'denomination'=>'required',
            'religion'=>'required|alpha',
            'mobile'=>'required',
            'placeofbirth'=>'required',
            'nationality'=>'required|alpha',
            'hometown'=>'required|alpha',
            'disability'=>'required',
            'postcode'=>'required',
            'email'=>'required|email',
            'maritalstatus'=>'required',
            'address'=>'required',
            'entrylevel'=>'required',
            'session'=>'required',
            'programme'=>'required',
            'type'=>'required',
            'guidianfullname'=>'required',
            'relationship'=>'required|alpha',
            'guidianoccupation'=>'required',
            'mobnumber'=>'required',
            'image'=>'required|image',
            'employed'=>'required'
        ]);


        function generateindexid($limit){
                $code = "GES";

                for ($i=0; $i < $limit; $i++) { 
                    $code .= mt_rand(0,9);
                }

                return $code;
            }

            $indexnumber = generateindexid(5);
        //create user
            $user = User::create([
                 'name' => $request->input('fullname'),
                 'email' => $request->input('email'),
                 'indexnumber'=> $indexnumber,
                 'pro_pic'=> $request->file('image')->store('profileimage','public'),
                'password' => Hash::make($request->input('email')),
            ]); 
            $user->assignRole('Student');

            if ($request->input('') == 'Degree Programme') {
                $duration = 4 + date('Y');
            }else{
                $duration = 3 + date('Y');
            }
        //transfer details to another table

                            $data = [
                                'fullname'=>$request->input('fullname'),
                                'gender'=>$request->input('gender'),
                                'dateofbirth'=>$request->input('dateofbirth'),
                                'religion'=>$request->input('religion'),
                                'denomination'=>$request->input('denomination'),
                                'placeofbirth'=>$request->input('placeofbirth'),
                                'nationality'=>$request->input('nationality'),
                                'hometown'=>$request->input('hometown'),
                                'region'=> '',
                                'disability'=>$request->input('disability'),
                                'postcode'=>$request->input('postcode'),
                                'address'=>$request->input('address'),
                                'email'=>$request->input('email'),
                                'phone'=>$request->input('mobile'),
                                'maritalstutus'=>$request->input('maritalstatus'),
                                'entrylevel'=> $request->input('entrylevel'),
                                'currentlevel'=>  $request->input('entrylevel'),
                                'session'=>$request->input('session'),
                                'programme'=>$request->input('programme'),
                                'type'=> $request->input('type'),
                                'currentlevel'=>$request->input(''),
                                'indexnumber'=> $indexnumber,
                                'gurdianname'=>$request->input('guidianfullname'),
                                'relationship'=>$request->input('relationship'),
                                'occupation'=>$request->input('guidianoccupation'),
                                'mobile' =>$request->input('mobnumber'),
                                'employed'=>$request->input('employed'),
                                'status'=> 1,
                                'academic_year' => $academic->academicyears,
                                'admitted' => "AUG,".date('Y'),
                                'completion'=> 'AUG'.$duration
                            ];
    

        $studentinfos = new Studentinfo($data);
        $user->studentinfos()->save($studentinfos);  


        $email = $request->input('email');
        $fullanem = $request->input('fullname');

        //SEND MAIL TO NEW STUDENT HERE
        Notification::route('mail', $email)
             ->notify(new NewstudentMail($fullname));
        //END MAIL HERE                  
        
        return Redirect()->back()->with('message',"Student Registered Successfully!");


    }

































}
