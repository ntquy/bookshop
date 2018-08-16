<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    
    public function books()
    {
    	return $this->belongsToMany('App\Book')->withTimestamps();
    }

    public function coupon()
    {
    	return $this->belongsTo('App\Coupon');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function order()
    {
        return $this->hasMany('App\OrderDetail', 'order_id');
    }
}
