<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function categories()
    {
    	return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment', 'book_id');
    }

    public function orders()
    {
    	return $this->belongsToMany('App\Order')->withTimestamps();
    }

    public function promotion()
    {
    	return $this->belongsTo('App\Promotion');
    }

    public function publisher()
    {
    	return $this->belongsTo('App\Publisher');
    }

    public function rates()
    {
    	return $this->hasMany('App\Rate', 'book_id');
    }
}
