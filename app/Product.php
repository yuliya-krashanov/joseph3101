<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Product extends Model implements ModelWithImageFieldsInterface
{
    use ModelWithImageOrFileFieldsTrait;

    protected $table = 'products';

    protected $fillable = ['title', 'description', 'image'];

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getImageFields()
    {
        return [
            'image' => 'products/',
        ];
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
        $this->categories()->detach();
        if ( ! $categories) return;
        if ( ! $this->exists) $this->save();

        $this->categories()->attach($categories);
    }

    public function setAdditionalCategoriesAttribute($categories)
    {
        $this->categories()->detach();
        if ( ! $categories) return;
        if ( ! $this->exists) $this->save();

        $this->categories()->attach($categories);
    }
}
