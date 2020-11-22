<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = "posts";
    protected $fillable = [
    	"title",
    	"keywords",
    	"description",
    	"fullstory",
    	"f_image",
    	"status"
    ];
}
