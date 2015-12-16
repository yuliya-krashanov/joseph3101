<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Category extends SleepingOwlModel
{
    protected $table = 'categories';

    protected $fillable = ['title'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public static function getList()
    {
        return self::lists('title', 'id')->all();
    }
}
