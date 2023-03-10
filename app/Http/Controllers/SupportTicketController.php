<?php

namespace App\Http\Controllers;

use App\SupportTicket;
use App\SupportTicketFiles;
use App\SupportTicketsReplies;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use URL;
use Symfony\Component\Console\Input\Input;

class SupportTicketController extends Controller
{
    public function all_tickets(){
    	$support = SupportTicket::latest()->get();
    	return view('Support_Ticket.all_tickets',['st'=>$support]);
    }


    public function create_ticket()
    {  
        //$sd = SupportDepartments::all();
        //$cl = Client::where('status', 'Active')->get();
        return view('Support_Ticket.create-new-ticket');
    }


    public function post_ticket(Request $request){

    	//dd($request);

    	$this->validate($request,[
    		'subject' => 'required',
    		'message' => 'required',
    		'did' => 'required'
       	]);


       	$data = [
       		'did' => $request->input('did'),
       		'cl_id' => auth()->user()->id,
       		'name' => auth()->user()->name,
       		'email' => auth()->user()->email,
       		'indexnumber' => auth()->user()->indexnumber,
       		'date' => date('Y-m-d'),
       		'subject' => $request->input('subject'),
       		'message' => $request->input('message'),
       		'status' => 'Pending',
       		'admin' => '',
       		'replyby' => '',
       		'closed_by' => '',
       	];


       	$support = new SupportTicket($data);
       	$support->save();

       	return Redirect()->route('view_tickets',['id'=>$support->id])->with('message','Ticket Created Successfully');

    }



    public function view_tickets($id){
    	$user = User::all();

    	$st          = SupportTicket::find($id);
    	$trply       = SupportTicketsReplies::where('tid', $id)->orderBy('date', 'desc')->get();
    	$ticket_file = SupportTicketFiles::where('ticket_id', $id)->get();

    	return view('Support_Ticket.view_support_ticket', compact('st', 'trply', 'ticket_file', 'user'));
    }



    public function post_basicinfo(Request $request){
    	$this->validate($request,[
    		'department' => 'required',
    		'status' => 'required'
    	]);


    	$id = $request->input('cmd');

    	$data = [
    		'did' => $request->input('department'),
    		'status' => $request->input('status'),
    	];

    	SupportTicket::findorfail($id)->update($data);

    	return Redirect()->back()->with('message','Basic Info Updated Successfully!');
    }


    public function reply_ticket(Request $request){

    	$this->validate($request,[
    		'message' => 'required'
       	]);

    	$message = $request->input('message');
    	$id = $request->input('cmd');

    	$st = SupportTicket::findorfail($id);
    	$clientid = $st->cl_id;
    	$department = $st->did;
    	$email = $st->email;
    	$clientname = $st->name;

    	//reply id name and image
    	$replyid = auth()->user()->id;
    	$replyname = auth()->user()->name;
    	$replyimage = auth()->user()->pro_pic;


    	// //admin
    	$data = [
    		'tid' => $id,
            'cl_id' => '0',
            'name' => '0',
            'date' => date('Y-m-d'),
            'message' => $message,
            'admin' => $replyname,
            'admin_id' => $replyid,
            'image' => 'admin',
    	];

    	$st->replyby = $replyname;
        $st->status  = 'Answered';
        $st->save();


    	$ticketreply = new SupportTicketsReplies($data);
    	$ticketreply->save();

    	


        return Redirect()->back()->with('message','Replied Successfully!');




    }




    public function post_ticket_file(Request $request){
    	$this->validate($request,[
    		'file_title' => 'required',
    		'file' => 'required'
       	]);

    	$file_title = $request->input('file_title');
    	$file = $request->file('file');
    	$id = $request->input('cmd');

        $admin_id   = auth()->user()->id;
        $admin_name = auth()->user()->name;

        if (isset($file) && in_array(strtolower($file->getClientOriginalExtension()), array("png", "jpeg", "gif", 'jpg', 'pdf', 'docx'))) {
                $file_name       = $file->getClientOriginalName();
                $file_size       = $file->getSize();

                $tf             = new SupportTicketFiles();
                $tf->ticket_id  = $id;
                $tf->cl_id      = '0';
                $tf->admin_id   = $admin_id;
                $tf->admin      = $admin_name;
                $tf->file_title = $file_title;
                $tf->file_size  = $file_size;
                $tf->file       = $request->file('file')->store('Support-ticket-files','public');
                $tf->save();

                //ADMIN
                // $tf             = new SupportTicketFiles();
                // $tf->ticket_id  = $cmd;
                // $tf->cl_id      = '0';
                // $tf->admin_id   = $admin_id;
                // $tf->admin      = $admin_name;
                // $tf->file_title = $file_title;
                // $tf->file_size  = $file_size;
                // $tf->file       = $file_name;



                //USSER
                // $tf             = new SupportTicketFiles();
                // $tf->ticket_id  = $cmd;
                // $tf->cl_id      = Auth::guard('client')->user()->id;
                // $tf->admin_id   = '0';
                // $tf->admin      = 'client';
                // $tf->file_title = $file_title;
                // $tf->file_size  = $file_size;
                // $tf->file       = $file_name;
                // $tf->save();



                 return Redirect()->back()->with('message','File Uploaded Successfully!');
            } else {
               
                return Redirect()->back()->with('error','Upload .png or .jpeg or .jpg or .gif file');
            }




    }



public function delete_ticket(Request $request){

	$id = $request->post('cid');

	$d = SupportTicket::find($id);
        if ($d) {
            SupportTicketsReplies::where('tid', '=', $id)->delete();
            $ticket = SupportTicketFiles::where('ticket_id', $id)->get();

            foreach ($ticket as $tf) {
                $file = $tf->file;
                $storage= Storage::disk('public')->delete($file);
            }

            $d->delete();

            echo 'Ticket Deleted Successfully';
        } else {
            echo 'Ticket info not found';
        }


}



 public function delete_ticket_file(Request $request){
    $id = $request->post('cid');

    $ticket_file = SupportTicketFiles::find($id);

        if ($ticket_file) {
            $ticket_id = $ticket_file->ticket_id;
            $file      = $ticket_file->file;
            $storage = Storage::disk('public')->delete($file);
            $ticket_file->delete();
            echo 'File Deleted Successfully';
        } else {
        	echo 'Ticket File not found';
        }	
 }

 public function download_ticket_file(Request $request){
 	$id = $request->post('cid');
 	$ticket_file = SupportTicketFiles::find($id)->file;
 	$fullpath = asset('storage')."/".$ticket_file;
    return response()->download($ticket_file);
 }


 public function dwn_ticket_file($id){
 	$ticket_file = SupportTicketFiles::find($id)->file;
 	$fullpath = asset('storage')."/".$ticket_file;
 	
 	return response()->download(public_path('storage/' . $ticket_file));

 	//return response()->download($fullpath);
 	//return url("{$fullpath}");
 	//return Redirect()->to("{$fullpath}");
 }









/*
*   Student Support Ticket
*
*/


public function all_tickets_student(){
    	$support = SupportTicket::where('cl_id',auth()->user()->id)->latest()->get();
    	return view('Support_Ticket.student_all_tickets',['st'=>$support]);
 }

 public function view_tickets_student($id){
    	$user = User::all();

    	$st          = SupportTicket::find($id);
    	$trply       = SupportTicketsReplies::where('tid', $id)->orderBy('date', 'desc')->get();
    	$ticket_file = SupportTicketFiles::where('ticket_id', $id)->get();

    	return view('Support_Ticket.view_support_student', compact('st', 'trply', 'ticket_file', 'user'));
 }


    public function create_ticket_student()
    {  
        //$sd = SupportDepartments::all();
        //$cl = Client::where('status', 'Active')->get();
        return view('Support_Ticket.create-new-ticket-student');
    }


    public function post_ticket_student(Request $request){

    	//dd($request);

    	$this->validate($request,[
    		'subject' => 'required',
    		'message' => 'required',
    		'did' => 'required'
       	]);


       	$data = [
       		'did' => $request->input('did'),
       		'cl_id' => auth()->user()->id,
       		'name' => auth()->user()->name,
       		'email' => auth()->user()->email,
       		'indexnumber' => auth()->user()->indexnumber,
       		'date' => date('Y-m-d'),
       		'subject' => $request->input('subject'),
       		'message' => $request->input('message'),
       		'status' => 'Pending',
       		'admin' => '',
       		'replyby' => '',
       		'closed_by' => '',
       	];


       	$support = new SupportTicket($data);
       	$support->save();

       	return Redirect()->route('view_tickets_student',['id'=>$support->id])->with('message','Ticket Created Successfully');

    }





    public function reply_ticket_student(Request $request){

    	$this->validate($request,[
    		'message' => 'required'
       	]);

    	$message = $request->input('message');
    	$id = $request->input('cmd');

    	$st = SupportTicket::findorfail($id);
    	$clientid = $st->cl_id;
    	$department = $st->did;
    	$email = $st->email;
    	$clientname = $st->name;

    	//reply id name and image
    	$replyid = auth()->user()->id;
    	$replyname = auth()->user()->name;
    	$replyimage = auth()->user()->pro_pic;

    	//user 
    	$data = [
    		'tid' => $id,
            'cl_id' => $clientid,
            'admin_id' => '0',
            'name' => $clientname,
            'date' => date('Y-m-d'),
            'message' => $message,
            'admin' => 'client',
            'image' => 'user',
    	];


    	$st->replyby = $clientname;
        $st->status  = 'Customer Reply';
        $st->save();


    	$ticketreply = new SupportTicketsReplies($data);
    	$ticketreply->save();

    	


        return Redirect()->back()->with('message','Replied Successfully!');




    }



    public function post_ticket_file_student(Request $request){
    	$this->validate($request,[
    		'file_title' => 'required',
    		'file' => 'required'
       	]);

    	$file_title = $request->input('file_title');
    	$file = $request->file('file');
    	$id = $request->input('cmd');

        $admin_id   = auth()->user()->id;
        $admin_name = auth()->user()->name;

        if (isset($file) && in_array(strtolower($file->getClientOriginalExtension()), array("png", "jpeg", "gif", 'jpg', 'pdf', 'docx'))) {
                $file_name       = $file->getClientOriginalName();
                $file_size       = $file->getSize();

                $tf             = new SupportTicketFiles();
                $tf->ticket_id  = $id;
                $tf->cl_id      = auth()->user()->id;
                $tf->admin_id   = '0';
                $tf->admin      = 'Student';
                $tf->file_title = $file_title;
                $tf->file_size  = $file_size;
                $tf->file       = $request->file('file')->store('Support-ticket-files','public');
                $tf->save();
                

                 return Redirect()->back()->with('message','File Uploaded Successfully!');
            } else {
               
                return Redirect()->back()->with('error','Upload .png or .jpeg or .jpg or .gif file');
            }




    }























}
