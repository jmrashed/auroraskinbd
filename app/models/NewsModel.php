<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table 			= "boi_news_categoris";
    protected $fillable 		= array('bnid','menuid','menusubid','newsmainid');
}
