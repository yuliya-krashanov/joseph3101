<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalCategory extends Model
{
    protected $table = ['additional_categories'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
