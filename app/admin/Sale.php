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
	FormItem::text('title', 'Title');
	FormItem::checkbox('enable', 'Enable');
    FormItem::ckeditor('description', 'Description');
	FormItem::date('start_date', 'Start Date');
	FormItem::date('end_date', 'End Date');
    FormItem::image('image', 'Image');
	FormItem::select('product_id', 'Product')->list(\App\Product::class);
    FormItem::textAddon('product.price', 'Price')->addon('$')->placement('after');
	FormItem::text('sale_price', 'Sale Price');
	FormItem::text('sale_percent', 'Sale Percent');
    FormItem::textAddon('sale_price', 'sale_price')->addon('$')->placement('after')->required();
});