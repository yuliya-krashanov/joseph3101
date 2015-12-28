<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";

    protected $fillable = ['title', 'description', 'enable', 'start_date', 'end_date', 'image', 'sale_price', 'sale_percent'];

    protected $dates = ['start_date', 'end_date'];

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function scopeActual($query)
    {
    	return $query->where('enable', 1)
    				 ->where('start_date', '<=', Carbon::now())
    				 ->where('end_date', '>', Carbon::now())
    				 ->orderBy('start_date', 'desc');
    }
}
