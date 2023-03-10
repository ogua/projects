<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = ['name','code','type','duration','department'];
}
