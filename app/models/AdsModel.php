<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdsModel extends Model
{
    protected $table 			= "boi_ads";
    protected $fillable 		= array('type','title','image','positioning','status');
}
