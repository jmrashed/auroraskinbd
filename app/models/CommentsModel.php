<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table 			= "boi_comments";
    protected $fillable 		= array('cid','name','email','comment','active','newsid','replyid','datetime');
}
