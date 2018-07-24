<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = ['id'];
    
    public function books()
    {
    	return $this->hasMany('App\Book', 'promotion_id');
    }
}
