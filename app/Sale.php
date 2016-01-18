<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Sale extends Model
{
   // use ModelWithImageOrFileFieldsTrait;

    protected $table = "sales";

    protected $fillable = ['title', 'description', 'enable', 'start_date', 'product_id', 'end_date', 'image', 'sale_price', 'sale_percent'];

    protected $dates = ['start_date', 'end_date'];

    protected $dateFormat = 'Y-m-d';

//    public function getImageFields()
//    {
//        return [
//            'image' => 'coupons/'
//        ];
//    }
//
    public function setImageAttribute($value)
    {
        dd($value);
        if ( ! $value) return;
        if ( ! $this->exists) $this->save();
        $product = Product::find($this->attributes['product_id']);
        dd($product);
        // you can use Intervention Image package features to change uploaded image
        $image = \Image::make(asset('images/coupons_basic/c'.$value.'.png'))->insert(asset('images/products/'.$product->image), 'center-left', 15, 0)->save();
        $image->text('Special Price', 0, 20, function($font) {
            $font->size(18);
            $font->color('#000');
            $font->align('center');
        });
        $image->text($this->attributes['title'], 180, 80, function($font) {
            $font->size(20);
            $font->color('#000');
            $font->align('center');
        });
        $image->text('instead of '. $product->price_s, 200, 100, function($font) {
            $font->size(14);
            $font->color('red');
            $font->align('center');
        });

        $image->save(asset('images/coupons/sale_' . Carbon::now() .'.png'));

    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function scopeActual($query)
    {
    	return $query->where('enable', 1)
    				 ->where('start_date', '<=', Carbon::today())
    				 ->where('end_date', '=>', Carbon::today())
    				 ->orderBy('start_date', 'desc');
    }
}
