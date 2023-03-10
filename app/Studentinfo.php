<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentinfo extends Model
{
    protected $fillable = [
    	'fullname','gender','dateofbirth','religion','denomination','placeofbirth','nationality','hometown','region','disability','postcode','address','email','phone','maritalstutus','entrylevel','session','programme','currentlevel','indexnumber','gurdianname','relationship','occupation','mobile','employed','status','admitted','academic_year','completion','type',
    ];

    public function user(){
        return $this->belongsto('App\User');
    }
}
