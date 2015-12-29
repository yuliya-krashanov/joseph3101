<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Sale extends Model implements ModelWithImageFieldsInterface
{
    use ModelWithImageOrFileFieldsTrait;

    protected $table = "sales";

    protected $fillable = ['title', 'description', 'enable', 'start_date', 'end_date', 'image', 'sale_price', 'sale_percent'];

    protected $dates = ['start_date', 'end_date'];

    protected $dateFormat = 'Y-m-d';


    public function getImageFields()
    {
        return [
            'image' => 'sales/',
        ];
    }

    public function setImage($field, $image)
    {
        parent::setImage($field, $image);
        $file = $this->$field;
        if ( ! $file->exists()) return;
        $path = $file->getFullPath();

        // you can use Intervention Image package features to change uploaded image
        \Image::make($path)->resize(10, 10)->save();
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
