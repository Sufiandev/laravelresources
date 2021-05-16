<?php

namespace App\Model\Resources;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $fillable = [
    	'name',
    	'email',
    	'job',
    	'qualification',
    	'phone',
    	'exp',
    	'file'
    ];
}
