<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Validator;

use Illuminate\Support\Facades\Auth;

use App\Booking;

use App\User;

use App\Notifications\Notifyusers;

use Illuminate\Auth\Access\Response;


use Illuminate\Support\Facades\Gate;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        return view('booking.all_booking',['booking'=>$booking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $when = now()->addSeconds(10);
        //$user->notify((new Notifyusers($name,$email))->delay($when));

        return view('booking.new_booking');
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
            'appid'=>'required|unique:bookings',
            'gender'=>'required',
            'age'=>'required',
            'category'=>'required',
            'appdate'=>'required',
            'apptime'=>'required'
         ]);
        
         
        $data = [
            'appid'=> $request->input('appid'),
            'gender'=> $request->input('gender'),
            'age'=> $request->input('age'),
            'categoty'=> $request->input('category'),
            'appdate'=> $request->input('appdate'),
            'apptime'=> $request->input('apptime')
        ];
        

        $user = User::find(Auth::user()->id);
        $booking = new Booking($data);
        $user->bookings()->save($booking);

        if($booking){
            $notification = array(
				'message'=>'Booking Added Successfully!',
				'alert-type'=>'success'
            );
            
            return Redirect()->back()->with($notification);
        }

      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('booking.edit_booking',['booking'=>$booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'gender'=>'required',
            'age'=>'required',
            'category'=>'required',
            'appdate'=>'required',
            'apptime'=>'required'
         ]);
        
         
        $data = [
            'gender'=> $request->input('gender'),
            'age'=> $request->input('age'),
            'categoty'=> $request->input('category'),
            'appdate'=> $request->input('appdate'),
            'apptime'=> $request->input('apptime'),
        ];
            
            $booking = Booking::find($request->input('bookid'));
            $booking->gender = $request->input('gender');
            $booking->age = $request->input('age');
            $booking->categoty = $request->input('category');
            $booking->appdate =$request->input('appdate');
            $booking->apptime = $request->input('apptime');
            $booking->save();

        if($booking){
            $notification = array(
				'message'=>'Booking Editted Successfully!',
				'alert-type'=>'success'
            );
            
            return Redirect()->route('edit-booking', ['id'=> $request->input('bookid')] )->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $booking = Booking::find($id);

        if(Gate::denies('delete-booking')){
            $notification = array(
                'message'=>'Access Denied',
                'title'=>'Failed!',
                'type'=>'callout-danger'
            );
            return Redirect()->back()->with($notification);
        }


        $booking->delete();


        $notification = array(
            'message'=>'Booking Deleted Successfully!',
            'alert-type'=>'success'
        );
        return Redirect()->route('all-booking')->with($notification);
    }
}
