<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VoteModel extends Model
{
    protected $table 			= "boi_vote";
    protected $fillable 		= array('title','status','date');
}
