<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    
}
