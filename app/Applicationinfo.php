<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicationinfo extends Model
{
    protected $fillable = [
    	'session','firstchoice','secondchoice','thirdchoice','indexnumber','entrylevel','programme','duration','type',
    ];

    public function osncode(){
    	return $this->belongsto('App\Osncode');
    }
}
