<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['user_id','brancode','productname','type','nbs','quantity','price','nas','sold','sinlgleleft','product_id','bill_id','oprice'];
}
