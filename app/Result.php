<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
    	'resulttype','examtype','examyear','indexnumber','subject1','grade1',
    	'subject2','grade2','subject3','grade3','subject4','grade4','subject5','grade5','subject6','osncode_id'
    ];



    public function osncode(){
    	return $this->belongsto('App\Osncode');
    }
}

