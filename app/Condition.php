<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $table = "sales";

    protected $fillable = ['title', 'description', 'enable', 'start_date', 'end_date', 'image', 'sale_price', 'sale_percent'];

    protected $dates = ['start_date', 'end_date'];

    public function product()
    {
    	return $this->belongsTo('App\Product', 'free_product_id');
    }
}
