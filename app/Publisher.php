<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = ['id'];
    
    public function books()
    {
    	return $this->hasMany('App\Book', 'publisher_id');
    }
}
