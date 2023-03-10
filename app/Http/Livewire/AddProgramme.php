<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Programme;

class AddProgramme extends Component
{

	public $name;
	public $typeofp;
	public $duration;
	public $department;
	public $allprogram;
    public $code;



	 public function updated($field){

        $this->validateOnly($field,[
            'name' => 'required|min:12|max:255',
            'typeofp' => 'required',
            'code'=> 'required|min:3|max:4',
            'duration' => 'required|integer',
            'department' => 'required|min:12|max:255',
        ]);

    }

	public function submitform(){
        
		$this->validate([
            'name' => 'required|min:12|max:255',
            'typeofp' => 'required',
            'code'=> 'required|min:3|max:4',
            'duration' => 'required|integer',
            'department' => 'required|min:12|max:255',
        ]);


        $data =  [
        	'name' => $this->name,
        	'type' => $this->typeofp,
            'code' => $this->code,
        	'duration' => $this->duration,
        	'department' => $this->department
        ];



        $created = Programme::create($data);

		if ($created) {
			session()->flash('message', 'Programme Added Successfully !');
		}

		$this->name = "";
		$this->typeofp = "";
		$this->duration = "";
		$this->department = "";
        $this->code = "";

		
	}



	public function mount($program)
    {
     	$this->allprogram = $program;
    }


    public function render()
    {
        return view('livewire.add-programme');
    }
}
