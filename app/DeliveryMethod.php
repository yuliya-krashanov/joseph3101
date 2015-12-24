<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    protected $table = 'delivery_methods';

    protected $fillable = ['name'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
