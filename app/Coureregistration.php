<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coureregistration extends Model
{
    protected $fillable = ['user_id','indexnumber','lecturer_id','cource_code','cource_title','credithours','IA_mark','exams_mark','total_marks','grade','grade_point','total_gp',
    'semester','academic_year','status','level'];
}