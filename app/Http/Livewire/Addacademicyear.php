<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Academicyear;

class Addacademicyear extends Component
{
	public $academic;
    public $semester;

	public $allacdemics;


	protected $listeners = ['approvestatus'];

	 public function updated($field)
    {
        $this->validateOnly($field, [
            'academic' => 'required|min:9',
            'semester'=> 'required'
        ]);
    }


	public function submitform(){

		$this->validate([
            'academic' => 'required|min:9',
            'semester'=> 'required'
        ]);


		$data = [
			'acdemicyear'=>$this->academic,
            'semester' => $this->semester
		];


		$created = Academicyear::create($data);

		if ($created) {
			session()->flash('message', 'Academic Year Added Successfully !');
		}

		$this->academic = "";

	}


	public function mount($academic)
    {
     	// dd($academic);
     	$this->allacdemics = $academic;
    }


    public function approvestatus($status,$id){
    	session()->flash('message', $id);
    }


    public function render()
    {
        return view('livewire.addacademicyear');
    }
}
