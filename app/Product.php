<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Product extends Model
{
  //  use ModelWithImageOrFileFieldsTrait;

    protected $table = 'products';

    protected $fillable = ['title', 'description', 'image', 'price_s', 'price_l', 'price_xl', 'enable'];

    public function getImageFields()
    {
        return [
            'image' => 'products/',
        ];
    }

    public function scopeOrderEnable($query)
    {
        return $query->where('enable', 1)->orderBy('price_s');
    }

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
        return $this->belongsToMany('App\AdditionalCategory', 'additional_category_product', 'product_id', 'category_id');
    }

    /**
     * The categories that belong to the product.
     */
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function getPriceSAttribute($value)
    {
        return round($value);
    }
    public function getPriceLAttribute($value)
    {
        return round($value);
    }
    public function getPriceXlAttribute($value)
    {
        return round($value);
    }

    public function setCategoriesAttribute($categories)
    {
        dd($categories);
        $this->categories()->detach();
        if ( ! $categories) return;
        if ( ! $this->exists) $this->save();

        $this->categories()->attach($categories);
    }

    public function setAdditionalCategoriesAttribute($categories)
    {
        $this->additional_categories()->detach();
        if ( ! $categories) return;
        if ( ! $this->exists) $this->save();

        $this->additional_categories()->attach($categories);
    }

    public static function getList()
    {
        return self::lists('title', 'id')->all();
    }
}
