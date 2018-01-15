<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{
    protected $table 			= "boi_galleryalbum";
    protected $fillable 		= array('atitle');
}
