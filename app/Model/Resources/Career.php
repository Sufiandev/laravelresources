<?php

namespace App\Model\Resources;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
    	'title',
    	'type',
    	'exp',
    	'display',
    	'details'
    ];
}
