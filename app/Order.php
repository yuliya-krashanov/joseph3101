<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['id','user_id', 'amount', 'delivery_method', 'payment_method', 'print', 'status', 'comment', 'stripe_transaction_id'];

    public $incrementing = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery_method()
    {
    	return $this->belongsTo('App\DeliveryMethod');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_method()
    {
    	return $this->belongsTo('App\PaymentMethod');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * @return $this
     */
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('size', 'quantity', 'subtotal', 'ingredients');
    }
}
