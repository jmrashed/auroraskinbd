<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LaravelModel extends Model
{
    protected $table 		= "users";
    protected $fillable 	= array('id', 'name','email','password');


     // protected $fillable = array('address');
     // protected $table = 'Locations';  
}
