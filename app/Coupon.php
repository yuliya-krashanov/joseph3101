<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = "coupons";

    protected $fillable = ['title', 'description', 'enable', 'start_date', 'end_date', 'image', 'discount', 'min_order'];

    protected $dates = ['start_date', 'end_date'];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function orders()
    {
    	return $this->hasMany('App\Order');
    }
}
