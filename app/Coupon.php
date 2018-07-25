<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = ['id'];
    
    public function orders()
    {
    	return $this->hasMany('App\Order', 'coupon_id');
    }
}
