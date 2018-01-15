<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    
    protected $table 			= "boi_gallery";
    protected $fillable 		= array('title','type','image','status');
}
