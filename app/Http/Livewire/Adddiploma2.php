<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Course;
use DB;

class Adddiploma2 extends Component
{

	public $allprogram;
	public $course;
	public $name;
	public $chrs;




	public function updated($field){

        $this->validateOnly($field,[
            'name' => 'required|min:8|max:255',
            'chrs' => 'required|integer'
        ]);

    }

	public function submitform(){


		$this->validate([
            'name' => 'required|min:8|max:255',
            'chrs' => 'required|integer'
        ]);



		$maxcode = DB::table('courses')->where('level', 'level 200')->max('code');
		if ($maxcode) {
			$max = substr($maxcode, 4);
	    	$number = $max + 1;
	    	$code = "PDBA".$number;
		}else{
			$code = "PDBA200";
		}


    	

		$data =  [
			'title'=>$this->name,
			'code'=>$code,
			'credithours' =>$this->chrs,
			'level' => 'Level 200',
			'program' => 'Diploma'
		];


		 $created = Course::create($data);

		if ($created) {
			session()->flash('message', 'Course Added Successfully !');
		}

		$this->name = "";
		$this->chrs = "";
	}

	public function mount($program,$course)
    {
     	$this->allprogram = $program;
     	$this->course = $course;
    }


    public function render()
    {
        return view('livewire.adddiploma2');
    }
}
