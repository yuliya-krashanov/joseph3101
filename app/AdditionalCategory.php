<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class AdditionalCategory extends Model
{
    protected $table = 'additional_categories';

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($this->title);
    }

    public static function getList()
    {
        return self::all()->toArray();
    }
}
