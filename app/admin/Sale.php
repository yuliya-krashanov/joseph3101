<?php

Admin::model(App\Sale::class)->title('Sales')->with('product')->filters(function ()
{

})->columns(function ()
{
    Column::string('title', 'Title');
    Column::string('description', 'Description');
    Column::date('start_date', 'Start Date');
    Column::date('end_date', 'End Date');
    Column::image('image', 'Image');

})->form(function ()
{
    FormItem::register('my', function ($instance)
    {
        AssetManager::addScript(URL::asset('js/admin.js'));

        return 'anything';
    });

	FormItem::text('title', 'Title')->required();
	FormItem::checkbox('enable', 'Enable');
    FormItem::ckeditor('description', 'Description');
	FormItem::date('start_date', 'Start Date')->required();
	FormItem::date('end_date', 'End Date')->required();
	FormItem::select('product_id', 'Product')->list(\App\Product::class)->required();
    FormItem::textAddon('product.price', 'Price')->addon('$')->placement('after');
    FormItem::textAddon('sale_price', 'Sale Price')->addon('$')->placement('after')->required();
	FormItem::text('sale_percent', 'Sale Percent');
    FormItem::select('image', 'Coupon Theme')->list([1,2,3,4,5,6])->required();
});