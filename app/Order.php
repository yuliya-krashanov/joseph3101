<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';


    public function user()
    {
    	return $this->belongsTo('App/User');
    }

    public function delivery_method()
    {
    	return $this->belongsTo('App/DeliveryMethod');
    }

    public function payment_method()
    {
    	return $this->belongsTo('App/PaymentMethod');
    }
}
