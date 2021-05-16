<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'menu_id';
    protected $fillable = [
        'name', 'slug','keywords','description','title','heading','details','displayOrder','display','image',
        'position','parent_id'
    ];
}
