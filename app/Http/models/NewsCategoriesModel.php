<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NewsCategoriesModel extends Model
{
    protected $table 			= "boi_news_categoris";
    protected $fillable 		= array('menuid','menusubid','newsmainid');
}
