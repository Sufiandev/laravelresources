<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $primaryKey = 'cat_id';
	
    protected $fillable = [
        'cat_name', 'cat_desc','cat_details','parent_id','cat_image'
    ];
}
