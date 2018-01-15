<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    protected $table 			= "boi_menu";
     protected $fillable 		= array('menuid','menuposid','menutitle','menuslug','menuparent','menudescription','menustatus');
}
