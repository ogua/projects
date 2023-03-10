<?php

namespace App\Http\Controllers;

use App\Academicyear;
use App\Account;
use App\Jobs\Dispatchfees;
use App\MandatoryFee;
use App\OtherservicesFee;
use App\Paymentdeadline;
use App\Semesterfee;
use App\Studentfee;
use App\Studentinfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Yajra\DataTables\Facades\DataTables;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = MandatoryFee::latest()->get();
        return view('Accounts.add_mandatory_fees',['mandatory' => $accounts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);

        $maxcode = DB::table('mandatory_fees')->max('feecode');

        if ($maxcode) {
            $max = substr($maxcode, 3);
            $number = $max + 1;
            $code = "FEE".$number;
        }else{
            $code = "FEE100";
        }

        if ($request->has('hiddenid')) {
            
             $data = [
            'title' => $request->input('title')
            ];

            $mandatoryfees = MandatoryFee::findorfail($request->input('hiddenid'))
            ->update($data);

            return Redirect()->route('add-mandatory-fees')
            ->with('message','Fee Updated Successfully');

        }else{

            $data = [
            'title' => $request->input('title'),
            'feecode' => $code
            ];

            $mandatoryfees = new MandatoryFee($data);
            $mandatoryfees->save();

            return Redirect()->back()->with('message','Fee Added Successfully');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mandatory 
     * @return \Illuminate\Http\Response
     */
    public function deletemandatory($id)
    {
        $mandatoryfees = MandatoryFee::findorfail($id)->delete();
        return Redirect()->back()->with('message','Fee Deleted Successfully');

    }


    public function editmandatory($id){
         $accounts = MandatoryFee::findorfail($id);
        return view('Accounts.edit_mandatory_fees',['mandatory' => $accounts]);
    }






    /**************
    ****
    ****
    ****  Other Services Fees
    ****
    ****
    */

    public function add_other_services(){
         $accounts = OtherservicesFee::latest()->get();
        return view('Accounts.add_other_services_fees',['otherservce' => $accounts]);
    }

    public function save_other_services(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'fee' => 'required'
        ]);

        $maxcode = DB::table('otherservices_fees')->max('feecode');

        if ($maxcode) {
            $max = substr($maxcode, 4);
            $number = $max + 1;
            $code = "OFEE".$number;
        }else{
            $code = "OFEE100";
        }

        if ($request->has('hiddenid')) {
            
             $data = [
                'title' => $request->input('title'),
                'fee' => $request->input('fee')
            ];

            $mandatoryfees = OtherservicesFee::findorfail($request->input('hiddenid'))
            ->update($data);

            return Redirect()->route('add_other_services')
            ->with('message','Fee Updated Successfully');

        }else{

            $data = [
                'title' => $request->input('title'),
                'feecode' => $code,
                'fee' => $request->input('fee')
            ];

            $mandatoryfees = new OtherservicesFee($data);
            $mandatoryfees->save();

            return Redirect()->back()->with('message','Fee Added Successfully');
        }

    }


    public function delete_other_services($id)
    {
        $mandatoryfees = OtherservicesFee::findorfail($id)->delete();
        return Redirect()->back()->with('message','Fee Deleted Successfully');

    }


    public function edit_other_services($id){
         $accounts = OtherservicesFee::findorfail($id);
        return view('Accounts.edit_other_services',['otherservce' => $accounts]);
    }




    /**************
    ****
    ****
    ****   Fees Master
    ****
    ****
    */

    public function add_fees_master(){
        $accounts = OtherservicesFee::all();
        $mandatory = MandatoryFee::all();
        $academicyear = Academicyear::where('status','1')->first();
        $year = $academicyear->acdemicyear;
        $semesterfee = Semesterfee::where('academicyear',$year)
        ->orderBy('level')->latest()->get();

        return view('Accounts.add_fees_master',['otherservce' => $accounts, 'mandatory' => $mandatory,'year'=> $year, 'semesterfee'=>$semesterfee]);

    }



    public function view_fees_level100(){
        $academicyear = Academicyear::where('status','1')->first();
        $year = $academicyear->acdemicyear;
        $semesterfee = Semesterfee::where('academicyear',$year)
        ->where('level','Level 100')
        ->orderBy('feecode')->latest()->get();

        return view('Accounts.view_fee_level_100',['year'=> $year, 'semesterfee'=>$semesterfee]);
    }


    public function view_fees_level200(){
        $academicyear = Academicyear::where('status','1')->first();
        $year = $academicyear->acdemicyear;
        $semesterfee = Semesterfee::where('academicyear',$year)
        ->where('level','Level 200')
        ->orderBy('feecode')->latest()->get();

        return view('Accounts.view_fee_level_200',['year'=> $year, 'semesterfee'=>$semesterfee]);
    }


    public function view_fees_level300(){
        $academicyear = Academicyear::where('status','1')->first();
        $year = $academicyear->acdemicyear;
        $semesterfee = Semesterfee::where('academicyear',$year)
        ->where('level','Level 300')
        ->orderBy('feecode')->latest()->get();

        return view('Accounts.view_fee_level_300',['year'=> $year, 'semesterfee'=>$semesterfee]);
    }


    public function view_fees_level400(){
        $academicyear = Academicyear::where('status','1')->first();
        $year = $academicyear->acdemicyear;
        $semesterfee = Semesterfee::where('academicyear',$year)
        ->where('level','Level 400')
        ->orderBy('feecode')->latest()->get();

        return view('Accounts.view_fee_level_400',['year'=> $year, 'semesterfee'=>$semesterfee]);
    }



    public function save_fees_master_man(Request $request){

        $this->validate($request,[
            'level' => 'required',
            'session' => 'required',
            'title' => 'required',
            'fee' => 'required',
            'academicyear' => 'required'
        ]);



        $input = explode("-", $request->post('title'));
        $fee = $input[0];
        $feecode = $input[1];

        if ($request->has('hiddenid')) {
            
        }else{

        $sess = $request->post('session');
        $count = count($request->post('session'));

        $data = [
            'level'=> $request->post('level'),
            'fee'=> $fee,
            'feecode'=> $feecode,
            'feeamount'=> $request->post('fee'),
            'academicyear'=> $request->post('academicyear')
        ];


        //check if fee has already been added
        $fee = Semesterfee::where('level',$request->post('level'))
        ->where('feecode',$feecode)
        ->where('academicyear',$request->post('academicyear'))->first();

        if ($fee) {

            return Redirect()->back()->with('messages','Fees Already Added!');

        }else{

            for ($i=0; $i < $count; $i++) {

                $session = $sess[$i];
                $feeadd = new Semesterfee($data);
                $feeadd->save();
                $feeadd->session = $session;
                $feeadd->save();
            }

            return Redirect()->back()->with('message','Fees Added Successfully!');

        }



        }

        


    }


    public function save_fees_master_otherservice(Request $request){

         $this->validate($request,[
            'level' => 'required',
            'session' => 'required',
            'title' => 'required',
            'academicyear' => 'required'
        ]);



        $input = explode("-", $request->post('title'));
        $fee = $input[0];
        $feecode = $input[1];
        $amount = $input[2];

        # dd($feecode);

        if ($request->has('hiddenid')) {
            
        }else{

        $sess = $request->post('session');
        $count = count($request->post('session'));

        $data = [
            'level'=> $request->post('level'),
            'fee'=> $fee,
            'feecode'=> $feecode,
            'feeamount'=> $amount,
            'academicyear'=> $request->post('academicyear')
        ];


        //check if fee has already been added
        $fee = Semesterfee::where('level',$request->post('level'))
        ->where('feecode',$feecode)
        ->where('academicyear',$request->post('academicyear'))->first();

        if ($fee) {

            return Redirect()->back()->with('messages','Fees Already Added!');

        }else{

            for ($i=0; $i < $count; $i++) {

                $session = $sess[$i];
                $feeadd = new Semesterfee($data);
                $feeadd->save();
                $feeadd->session = $session;
                $feeadd->save();
            }

            return Redirect()->back()->with('message','Fees Added Successfully!');

        }



        }

        
    }




    public function delete_fees_master($id){
        $mandatoryfees = Semesterfee::findorfail($id)->delete();
        return Redirect()->back()->with('message','Fee Deleted Successfully');
    }


    public function edit_fees_master($id){
        $feemaster = Semesterfee::findorfail($id);
        return view('Accounts.edit_fee_master',['mandatory' => $feemaster]);

    }


    public function update_fees_master(Request $request, $id){

        $this->validate($request,[
            'level' => 'required',
            'session' => 'required',
            'title' => 'required',
            'feecode' => 'required',
            'fee' => 'required'
        ]);

        $data = [
            'level'=> $request->post('level'),
            'fee'=> $request->post('fee'),
            'feecode'=> $request->post('feecode'),
            'feeamount'=> $request->post('fee'),
            'session'=> $request->post('session')
        ];


        $mandatoryfees = Semesterfee::findorfail($id)->update($data);
        return Redirect()->route('add_fees_master')->with('message','Mandatory Fee Updated Successfully');

    }




    public function dispatch_fees(){
         $feemaster = Semesterfee::all();
         $getdeadline = Paymentdeadline::first();
        return view('Accounts.dispatch_fees',['semesterfee' => $feemaster,'deadline' => $getdeadline]);
    }

    public function dispatch_fees_now(){
        $this->dispatch(new Dispatchfees());
        return Redirect()->back()->with('message','Fees Dispatched Successfully');
    }








 /**************
    ****
    ****
    ****   Student Script
    ****
    ****
    */

    public function search_student(){
      $wallet = User::with('wallet')
      ->where('indexnumber', 'like', '%GES%')->get();
      # dd($wallet);

      $studentinfo = Studentinfo::
      where('indexnumber', 'like', '%GES%')->get();

      # dd($studentinfo);

      return view('Accounts.search_student',['wallet' => $wallet, 'studentinfo' => $studentinfo]);
    }



    public function view_student_fees($indexnumber){

        $studentid = Studentinfo::where('indexnumber',$indexnumber)->first();

        if ($studentid) {
            return Redirect()->route('getstudentfees_view',['id'=>$studentid->id]);            
        }else{
            return Redirect()->back()->with('messages','The index Number Entered Dont Exist');
        }
    }



    public function pay_students_fes($indexnumber){

         $studentid = Studentinfo::where('indexnumber',$indexnumber)->first();

        if ($studentid) {
            return Redirect()->route('paystudentfees_view',['id'=>$studentid->id]);            
        }else{
            return Redirect()->back()->with('messages','The index Number Entered Dont Exist');
        }
    } 






    public function getstudentfees_view($id){
        $studentinfo = Studentinfo::findorfail($id);
        $userinf = User::where('indexnumber',$studentinfo->indexnumber)->first();

        //get fees
        $fees = Studentfee::where('indexnumber',$studentinfo->indexnumber)->get();

        return view('Accounts.displayfees', ['studentinfo' => $studentinfo, 'user' =>$userinf, 'semesterfee' => $fees]);
        #dd($studentinfo);
    }




    public function paystudentfees_view($id){
        $studentinfo = Studentinfo::findorfail($id);
        $userinf = User::where('indexnumber',$studentinfo->indexnumber)->first();

        //get fees
        $fees = Studentfee::where('indexnumber',$studentinfo->indexnumber)->get();

        return view('Accounts.payfees', ['studentinfo' => $studentinfo, 'user' =>$userinf, 'semesterfee' => $fees]);
        #dd($studentinfo);
    }



    public function debit_wallet(Request $request){

        $this->validate($request,[
            'amount' => 'required',
            'confirmamount' => 'required'
        ]);

        $amount = $request->input('amount');
        $camount = $request->input('confirmamount');
        $id = $request->input('studntid');

        if ($amount !== $camount) {
            return Redirect()->back()->with('messages','Amount Entered Do Not Match');
        }

        $user = User::findorfail($id);
        $user->deposit($amount, ['Trantype' => 'WALLET TOPUP/DEPOSITE', 'Reference' => 'DEPOSITE']);

        return Redirect()->route('search_student')->with('message','Amount Debited Successfully!');

    }


    public function all_transactions(){

        $wallet = DB::table('transactions')->latest()->get();
        $user = User::all();
        $studentinfo = Studentinfo::all();
        return view('Accounts.transactions',['transaction' => $wallet, 
            'user' => $user, 'studentinfo' => $studentinfo]);
    }


    public function get_transactions(){
        $studentinfo = Studentinfo::all();

        $wallet = DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.payable_id')
        ->select([
            'users.id','transactions.payable_id','users.name',
            'users.indexnumber','transactions.created_at','transactions.meta',
            'transactions.uuid','transactions.amount','transactions.id AS tranid'
        ])->orderBy('transactions.id','Desc')->get();

        $studentinfo = Studentinfo::all();

        return Datatables::of($wallet)
        ->addColumn('session', function ($user) use ($studentinfo) {
            foreach ($studentinfo as $key => $row) {
                if ($user->payable_id == $row->user_id) {
                     return $row->session;
                 } 
            }
            
        })
        ->addColumn('trtype', function ($user) {
            $data = json_decode($user->meta, true);
            return $data['Trantype'];
            
        })
        ->addColumn('trrefrence', function ($user) {
            $data = json_decode($user->meta, true);
            return $data['Reference'];
            
        })
        ->addColumn('program', function ($user) use ($studentinfo) {
            foreach ($studentinfo as $key => $row) {
                if ($user->payable_id == $row->user_id) {
                     return $row->programme;
                 } 
            }
            
        })
        ->addColumn('refund', function ($user) use ($studentinfo) {
            return $user->tranid;            
        })
        ->addIndexColumn()
        ->make(true);

    }



    public function get_transactions_bydate(Request $request, $start, $end){
        $startdate = $start;
        $enddate = $end;

        $studentinfo = Studentinfo::all();
        $wallet = DB::table('transactions')
        ->join('users', 'users.id', '=', 'transactions.payable_id')
        ->select([
            'users.id','transactions.payable_id','users.name',
            'users.indexnumber','transactions.created_at','transactions.meta',
            'transactions.uuid','transactions.amount'
        ])
        ->whereBetween('transactions.created_at',[$startdate,$enddate] )
        ->orderBy('transactions.id','Desc')->get();

        $studentinfo = Studentinfo::all();

        return Datatables::of($wallet)
        ->addColumn('session', function ($user) use ($studentinfo) {
            foreach ($studentinfo as $key => $row) {
                if ($user->payable_id == $row->user_id) {
                     return $row->session;
                 } 
            }
            
        })
        ->addColumn('trtype', function ($user) {
            $data = json_decode($user->meta, true);
            return $data['Trantype'];
            
        })
        ->addColumn('trtype', function ($user) {
            $data = json_decode($user->meta, true);
            return $data['Reference'];
            
        })
        ->addColumn('program', function ($user) use ($studentinfo) {
            foreach ($studentinfo as $key => $row) {
                if ($user->payable_id == $row->user_id) {
                     return $row->programme;
                 } 
            }
            
        })
        ->addIndexColumn()
        ->make(true);
    }








    public function makepayment(){
        return view('Accounts.make_payment');
    }


    /**************
    ****
    ****
    ****  Student Online Payment
    ****
    ****
    */

    public function pay_mandatory_fees(){
        $id = auth()->user()->id;

        $studentinfo = Studentinfo::where('user_id',$id)->first();

        //get fees
        $wallet = User::with('wallet')
        ->where('id',$id)->first();

        $fees = Studentfee::where('indexnumber',$studentinfo->indexnumber)
        ->where('type','mandatory')->get();

        return view('Accounts.student_view_mandatory', 
            ['studentinfo' => $studentinfo,'semesterfee' => $fees, 'wallet' => $wallet]);
    }


    public function pay_mandatory_student(Request $request){

        $id = $request->post('id');
        $fee = $request->post('fee');
        $amount = $request->post('amount');


        DB::beginTransaction();


        try {

            $studentfee = Studentfee::where('id',$id)->first();
            $paid = $studentfee->paid;
            $owed = $studentfee->owed;

            if ($paid > 0) {
                $paidnow = $amount;

                //add paynow to paid
                $feeamount = $studentfee->feeamount;
                $paidnowpaid = $paidnow + $paid;

                $owingnow = $feeamount - $paidnowpaid;

                $studentfee->paid = $paidnowpaid;
                $studentfee->owed = $owingnow;
                $studentfee->save();
            }else{

                $feeamount = $studentfee->feeamount;
                $paidnow = $amount;
                $owednow = $feeamount - $amount;            


                $studentfee->paid = $paidnow;
                $studentfee->owed = $owednow;
                $studentfee->save();

            }
            

            $user = User::findorfail(auth()->user()->id);

            $user->withdraw($amount, ['Trantype' => 'Fees Payment', 'Reference' => $fee]);

            DB::commit();

            echo "success";

            exit;

        } catch (\Exception $e) {
            DB::rollback();

            echo "failed";
            
        }






    }





    public function other_services_fees(){
        $fees = OtherservicesFee::all();
        $wallet = User::with('wallet')
        ->where('id',auth()->user()->id)->first();
        return view('Accounts.student_view_otherservices', 
            ['semesterfee' => $fees, 'wallet' => $wallet]);
    }


    public function request_services(Request $request){
        $id = $request->post('id');
        $fee = $request->post('fee');
        $qty = $request->post('qty');
        $title = $request->post('title');
        $feecode = $request->post('feecode');
        $indexnumber = auth()->user()->indexnumber;

        $amt = $qty * $fee;


        $academicyear = Academicyear::where('status','1')->first();
        $year = $academicyear->acdemicyear;

         $data = [
             'indexnumber' => $indexnumber,
             'fee' => $title,
             'feecode' => $feecode,
             'feeamount' => $amt,
             'paid' => 0,
             'owed' => $amt,
             'type' => 'request',
             'semester' => $year
         ];

        $newfees = new Studentfee($data);
        $newfees->save();

        echo "success";

    }



    public function pay_other_services_fees(){
        $id = auth()->user()->id;

        $studentinfo = Studentinfo::where('user_id',$id)->first();

        //get fees
        $wallet = User::with('wallet')
        ->where('id',$id)->first();

        $fees = Studentfee::where('indexnumber',$studentinfo->indexnumber)
        ->where('type','request')->get();

        return view('Accounts.pay_other_request', 
            ['studentinfo' => $studentinfo,'semesterfee' => $fees, 'wallet' => $wallet]);
    }


    public function remove_request_services(Request $request){
        $id = $request->post('id');
        Studentfee::findorfail($id)->delete();
        echo "success";
    }


    public function submiited_other_services_fees(){
        $id = auth()->user()->id;

        $studentinfo = Studentinfo::where('user_id',$id)->first();

        //get fees
        $wallet = User::with('wallet')
        ->where('id',$id)->first();

        $fees = Studentfee::where('indexnumber',$studentinfo->indexnumber)
        ->where('type','request')
        ->where('owed',0)->get();

        return view('Accounts.student_req_submission', 
            ['studentinfo' => $studentinfo,'semesterfee' => $fees, 'wallet' => $wallet]);
    }

    public function print_statement(){
        return view('Accounts.print_statement');
    }

    public function transaction_history_student(){
        $id = auth()->user()->id;
        $wallet = DB::table('transactions')
        ->where('payable_id',$id)->latest()->get();
        $user = User::findorfail($id);
        $studentinfo = Studentinfo::where('user_id',$id)->first();
        return view('Accounts.student_transaction_history',['transaction' => $wallet, 
            'user' => $user, 'studentinfo' => $studentinfo]);
    }





    public function payment_deadline(Request $request){
        $date = $request->post('deadline');

        #getdeadline
        $getdeadline = Paymentdeadline::first();

        if ($getdeadline) {
            
            $getdeadline->deadline = $date;
            $getdeadline->date = date('Y-m-d');
            $getdeadline->save();

        }else{
            //new add
            $data = [
                'deadline' => $date,
                'date' => date('Y-m-d')
            ];

            $add = new Paymentdeadline($data);
            $add->save();
        }
    }




























}
