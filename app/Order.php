<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id', 'amount', 'delivery_method', 'payment_method', 'print', 'status', 'stripe_transaction_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function delivery_method()
    {
    	return $this->belongsTo('App\DeliveryMethod');
    }

    public function payment_method()
    {
    	return $this->belongsTo('App\PaymentMethod');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('size', 'quantity', 'subtotal', 'ingredients');
    }
}
