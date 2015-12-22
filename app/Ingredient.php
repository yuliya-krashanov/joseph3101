<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Ingredient extends SleepingOwlModel
{
    protected $table = 'ingredients';

    protected $fillable = ['title','price'];

    public function getPriceAttribute($value)
    {
        return round($value);
    }

}