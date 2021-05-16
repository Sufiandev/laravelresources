<?php

namespace App\Model\Resources;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
    	'name',
    	'slug',
    	'title',
    	'keyword',
    	'description',
    	'details',
    	'file',
    	'image',
    	'price',
    	'display',
    	'cat_id'
    ];
}
