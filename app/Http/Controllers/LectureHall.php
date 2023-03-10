<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hall;

class LectureHall extends Controller
{
    public function add_view_lecture_hall(){

    	$hall = Hall::latest()->get();
    	return view('hall.add_view',['hall'=>$hall]);
    }


    public function add_view_lecture_hall_save(Request $Request){
    	$this->validate($Request,[
    		'hallname' => 'required',
    		'hallcapacity' => 'required'
    	]);

    	$data = [
    		'name' => $Request->input('hallname'),
    		'capacity' => $Request->input('hallcapacity')
    	];

    	$hall = new Hall($data);
    	$hall->save();


    	return Redirect()->back()->with('message','Hall Saved Successfully!');

    }


    public function edit_hall($id, Request $Request){
    	$hall = Hall::where('id',$id)->first();
    	return view('hall.edit_hall',['hall'=>$hall]);
    }


    public function update_lect_hall($id, Request $Request){
    	$hall = Hall::where('id',$id)->first();
    	$hall->name = $Request->input('hallname');
    	$hall->capacity = $Request->input('hallcapacity');
    	$hall->save();

    	return Redirect()->route('add-view-lecture-hall')->with('message','Information Updated Successfully!');

    }


    public function delete_hall($id){
    	$hall = Hall::where('id',$id)->first();
    	$hall->delete();

    	return Redirect()->back()->with('message','Information Deleted Successfully!');

    }







}
