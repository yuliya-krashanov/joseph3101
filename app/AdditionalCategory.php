<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class AdditionalCategory extends Model
{
    protected $table = 'additional_categories';

    protected $fillable = ['title'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'additional_category_product', 'category_id');
    }

    public static function getList()
    {
        return self::lists('title', 'id')->all();
    }
}
