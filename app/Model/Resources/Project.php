<?php

namespace App\Model\Resources;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'name',
    	'details',
    	'type',
    	'display',
    	'image',
    	'city',
    	'slug',
    	'position'
    ];
}
