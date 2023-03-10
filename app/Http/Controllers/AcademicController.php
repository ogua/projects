<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academicyear;

class AcademicController extends Controller
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
        $academic = Academicyear::all();
        return view('Academicyear.new_academic_year', ['academic'=>$academic]);
    }



    public function updatestatus(Request $request){
        $id = $request->post('cid');
        $status = $request->post('status');
        if ($status == '1') {
            //clear all active status

             // $academic = Academicyear::all();
             // $academic->status = 0;
             // $academic->save();             

            //create new status

            $acadnow = Academicyear::where('id',$id)->first();
            $acadnow->status = 1;
            $acadnow->save();

            $msg = "Status Updated Successfully!";
            return response()->json(array('msg'=> $msg), 200);
        }else{
            //create new ststus
            $academic = Academicyear::where('id',$id)->first();
            $academic->status = '0';
            $academic->save(); 

            $msg = "Status Updated Successfully!";
            return response()->json(array('msg'=> $msg), 200);
        }
        
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $academic = Academicyear::where('id', $id)->first();
        return view('Academicyear.academic_year_edit', ['academic'=>$academic]);
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
        $id = $request->post('hiddenid');
        $acdemic = $request->post('academic'); 
        $semester = $request->post('semester');

        $this->validate($request,[
            'academic' => 'required|min:9',
            'semester'=> 'required'
        ]);
        
        $acdemi = Academicyear::where('id',$id)->first();
        $acdemi->acdemicyear = $acdemic;
        $acdemi->semester = $semester;
        $acdemi->save();

        return Redirect()->route('add-academic-year')->with('message', 'Academic Year Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
