<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = ['products'];

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * The categories that belong to the product.
     */
    public function additional_categories()
    {
        return $this->belongsToMany('App\AdditionalCategory');
    }
}
