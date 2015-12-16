<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Product extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
    use ModelWithImageOrFileFieldsTrait;

    protected $table = 'products';

    protected $fillable = ['title', 'description', 'image', 'price_s', 'price_l', 'price_xl', 'enable'];

    public function getImageFields()
    {
        return [
            'image' => 'products/',
        ];
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
        return $this->belongsToMany('App\AdditionalCategory', null, null, 'category_id');
    }


    public function setCategoriesAttribute($categories)
    {
        dd($this->categories());
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
}
