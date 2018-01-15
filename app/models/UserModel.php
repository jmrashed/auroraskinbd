<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
     protected $table 			= "boi_user_categoris";
    protected $fillable 		= array('bnid','menuid','menusubid','userid');
}
