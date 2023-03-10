<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id','branchcode','productname',
    'productType','productprice','quantuty','alert','pieces'];
}
