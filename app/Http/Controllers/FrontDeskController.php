<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admissionenquiry;
use App\Visitor;
use App\Calllog;
use App\Postaldispatch;
use App\Postalreceive;
use Illuminate\Support\Facades\Storage;


class FrontDeskController extends Controller
{


	 /*
		Admission Enquiry Script	
    */

    public function addenquiry(){
    	$enquiry = Admissionenquiry::latest()->get();
    	return view('Front_Desk.admission_enquiry',['enquiries'=>$enquiry]);
    }


    public function saveenquiry(Request $request){

    	$this->validate($request,[
    		'fullname' => 'required',
    		'gender' => 'required',
    		'phone-number' => 'required|min:10|max:10',
    		'email' => 'required|email',
    		'location' => 'required',
    		'note' => 'required',
    	]);


    	$data = [
    		'fullname' => $request->input('fullname'),
    		'gender' => $request->input('gender'),
    		'phone' => $request->input('phone-number'),
    		'email' => $request->input('email'),
    		'location' => $request->input('location'),
    		'note' => $request->input('note')
    	];



    	if ($request->has('hiddenid')) {
    		$id = $request->input('hiddenid');

    		$this->validate($request,[
    		 'hiddenid' => 'required'
    	   ]);

    		$enquiry = Admissionenquiry::findorfail($id)->update($data);
    		return Redirect()->route('add-enquiry')
    		->with('message','Enquiry Updated Successfully!');
    		
    	}else{

    		$enquiry = new Admissionenquiry($data);
    	    $enquiry->save();
    	    return Redirect()->back()->with('message','Enquiry Recorded Successfully!');

    	}



    }


    public function editenquiry($id){
    	$enquiry = Admissionenquiry::findorfail($id);
    	return view('Front_Desk.edit_enquiry',['enquiry'=>$enquiry]);
    }


    public function deleteenquiry($id){
    	$enquiry = Admissionenquiry::findorfail($id);
    	$enquiry->delete();
    	return Redirect()->back()->with('message','Enquiry Deleted Successfully!');
    }




    /*
		Visitors Script	
    */

	public function addvisitor(){
		$visitor = Visitor::latest()->get();
    	return view('Front_Desk.visitors',['visitors'=>$visitor]);
	}

	public function savevisitor(Request $request){

		#dd($request);


		$this->validate($request,[
			'fullname' => 'required',
			'phone-number' => 'required|min:10|max:10',
			'purpose' => 'required',
			'intime' => 'required'
		]);


		$data = [
			'fullname' => $request->input('fullname'),
			'phone' => $request->input('phone-number'),
			'idcard' => $request->input('idcard'),
			'numofpersons' => $request->input('noofpersons'),
			'purpose' => $request->input('purpose'),
			'intime' => $request->input('intime'),
			'outtime' => $request->input('outtime'),
			'note' => $request->input('note')
		];

		

		if ($request->has('hiddenid')) {

			$id = $request->input('hiddenid');
			Visitor::findorfail($id)->update($data);


			if ($request->has('fileinput')) {

				$visitor = Visitor::findorfail($id);
				//check if there is a document availbale
				$doc = $visitor->doc;

				if ($doc) {
					# there is a document uploaded
					#delete old doc
					$storage= Storage::disk('public')->delete($doc); 

					#update with new doc
					if ($storage) {
						# code...
						$visitor->doc = $request->file('fileinput')->store('VisitorsDoc','public');
						$visitor->save();
					}

				}else{
					# there is no document upoaded. so upload a new document
					$visitor->doc = $request->file('fileinput')->store('VisitorsDoc','public');
					$visitor->save();
				}
		    }

			return Redirect()->route('add-visitor')
    		->with('message','Details Updated Successfully!');

		}else{
			$visitor = new Visitor($data);
			$visitor->save();

			if ($request->has('fileinput')) {
				$visitor->doc = $request->file('fileinput')->store('VisitorsDoc','public');
				$visitor->save();
			}

			return Redirect()->back()->with('message','Details Recorded Successfully!');
		}


	}

	public function editvisitor($id){
		$visitor = Visitor::findorfail($id);
    	return view('Front_Desk.edit_visitors',['visitor'=>$visitor]);
	}

	public function deletevisitor($id){
		$visitor = Visitor::findorfail($id);
		$doc = $visitor->doc;
		if ($doc) {
			# there is a document uploaded
			#delete old doc
			$storage= Storage::disk('public')->delete($doc); 
		}

    	$visitor->delete();
    	return Redirect()->back()->with('message','Visitors Info Deleted Successfully!');
	}






    /*
		Call Log Script	
    */


	public function addcall(){
		$calllog = Calllog::latest()->get();
    	return view('Front_Desk.calllog',['calllogs'=>$calllog]);
	}

	public function savecall(Request $request){
		$this->validate($request,[
			'calltype' => 'required',
			'fullname' => 'required',
			'phone-number' => 'required|min:10|max:10',
			'callduration' => 'required'
		]);


		$data = [
			'fullname' => $request->input('fullname'),
			'phone' => $request->input('phone-number'),
			'duration' => $request->input('callduration'),
			'followupdate' => $request->input('followupdate'),
			'note' => $request->input('note'),
			'type' => $request->input('calltype')
		];


		if ($request->has('hiddenid')) {
			# code...
			$id = $request->input('hiddenid');
			$calllog = Calllog::findorfail($id)->update($data);
			return Redirect()->route('add-call')->with('message','Call Info Updated Successfully!');
		}else{
			$calllog = new Calllog($data);
			$calllog->save();
			return Redirect()->back()->with('message','Call Recorded Successfully!');
		}


		

	}

	public function editcall($id){
		$calllog = Calllog::findorfail($id);
    	return view('Front_Desk.edit_call',['calllog'=>$calllog]);
	}

	public function deletecall($id){
		$calllog = Calllog::findorfail($id);
    	$calllog->delete();
    	return Redirect()->back()->with('message','Call Log Deleted Successfully!');
	}	







    /*
		Postal Dispatch Script	
    */

	public function addpostalDispatch(){
		$postaldispatch = Postaldispatch::latest()->get();
    	return view('Front_Desk.postal_dispatch',['dispatches'=>$postaldispatch]);
	}

	public function savepostalDispatch(Request $request){

		if ($request->has('hiddenid')) {

			$this->validate($request,[
				'totitle' => 'required',
				'ref' => 'required',
				'address' => 'required',
				'fromtitle' => 'required',
				'docdate' => 'required'
			]);

		}else{
				$this->validate($request,[
					'totitle' => 'required',
					'ref' => 'required',
					'address' => 'required',
					'fromtitle' => 'required',
					'docdate' => 'required',
					'doc' => 'required'
			    ]);
		}

		


		$data = [
			'to' => $request->input('totitle'),
			'ref' => $request->input('ref'),
			'address' => $request->input('address'),
			'from' => $request->input('fromtitle'),
			'docdate' => $request->input('docdate')
		];


		if ($request->has('hiddenid')) {
			# code...

			$id = $request->input('hiddenid');
			Postaldispatch::findorfail($id)->update($data);


			if ($request->has('fileinput')) {

				$postaldispatch = Postaldispatch::findorfail($id);
				//check if there is a document availbale
				$doc = $postaldispatch->doc;

				if ($doc) {
					# there is a document uploaded
					#delete old doc
					$storage= Storage::disk('public')->delete($doc); 

					#update with new doc
					if ($storage) {
						# code...
						$postaldispatch->doc = $request->file('doc')->store('PostalDispatch','public');
						$postaldispatch->save();
					}

				}else{
					# there is no document upoaded. so upload a new document
					$postaldispatch->doc = $request->file('doc')->store('PostalDispatch','public');
					$postaldispatch->save();
				}
		    }

			return Redirect()->route('add-postal-dispatch')
    		->with('message','Info Updated Successfully!');


		}else{

			# dd($data);

			$postaldispatch = new Postaldispatch($data);
			$postaldispatch->save();

			if ($request->has('doc')) {
				# code...
				$postaldispatch->doc = $request->file('doc')
				->store('PostalDispatch','public');

				$postaldispatch->save();
			}
			return Redirect()->back()->with('message','Info Saved Successfully!');
		}
		

	}

	public function editpostalDispatch($id){
		$postaldispatch = Postaldispatch::findorfail($id);
    	return view('Front_Desk.edit_postal_dispatch',['dispatch'=>$postaldispatch]);
	}

	public function deletepostalDispatch($id){
		$postaldispatch = Postaldispatch::findorfail($id);
		$doc = $postaldispatch->doc;
		if ($doc) {
			# there is a document uploaded
			#delete old doc
			$storage= Storage::disk('public')->delete($doc); 
		}

    	$postaldispatch->delete();
    	return Redirect()->back()->with('message','Info Deleted Successfully!');
	}







    /*
		Postal Receive Script	
    */

	public function addpostalreceive(){
		$postalreceive = Postalreceive::latest()->get();
    	return view('Front_Desk.postal_received',['dispatches'=>$postalreceive]);
	}

	public function savepostalreceive(Request $request){

		if ($request->has('hiddenid')) {

			$this->validate($request,[
				'totitle' => 'required',
				'ref' => 'required',
				'address' => 'required',
				'fromtitle' => 'required',
				'docdate' => 'required'
			]);

		}else{
				$this->validate($request,[
					'totitle' => 'required',
					'ref' => 'required',
					'address' => 'required',
					'fromtitle' => 'required',
					'docdate' => 'required',
					'doc' => 'required'
			    ]);
		}

		


		$data = [
			'to' => $request->input('totitle'),
			'ref' => $request->input('ref'),
			'address' => $request->input('address'),
			'from' => $request->input('fromtitle'),
			'docdate' => $request->input('docdate')
		];


		if ($request->has('hiddenid')) {
			# code...

			$id = $request->input('hiddenid');
			Postalreceive::findorfail($id)->update($data);


			if ($request->has('fileinput')) {

				$postalreceive = Postalreceive::findorfail($id);
				//check if there is a document availbale
				$doc = $postalreceive->doc;

				if ($doc) {
					# there is a document uploaded
					#delete old doc
					$storage= Storage::disk('public')->delete($doc); 

					#update with new doc
					if ($storage) {
						# code...
						$postalreceive->doc = $request->file('doc')->store('PostalReceive','public');
						$postalreceive->save();
					}

				}else{
					# there is no document upoaded. so upload a new document
					$postalreceive->doc = $request->file('doc')->store('PostalReceive','public');
					$postalreceive->save();
				}
		    }

			return Redirect()->route('add-postal-receive')
    		->with('message','Info Updated Successfully!');


		}else{

			# dd($data);

			$postalreceive = new Postalreceive($data);
			$postalreceive->save();

			if ($request->has('doc')) {
				# code...
				$postalreceive->doc = $request->file('doc')
				->store('PostalReceive','public');

				$postalreceive->save();
			}
			return Redirect()->back()->with('message','Info Saved Successfully!');
		}
		

	}

	public function editpostalreceive($id){
		$postalreceive = Postalreceive::findorfail($id);
    	return view('Front_Desk.edit_postal_received',['dispatch'=>$postalreceive]);
	}

	public function deletepostalreceive($id){
		$postalreceive = Postalreceive::findorfail($id);
		$doc = $postalreceive->doc;
		if ($doc) {
			# there is a document uploaded
			#delete old doc
			$storage= Storage::disk('public')->delete($doc); 
		}

    	$postalreceive->delete();
    	return Redirect()->back()->with('message','Info Deleted Successfully!');
	}


















}
