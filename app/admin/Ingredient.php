<?php

Admin::model(App\Ingredient::class)->title('Ingredients')->with()->filters(function ()
{

})->columns(function ()
{
	Column::string('id', 'Id');
	Column::string('title', 'Title');
	Column::string('price', 'Price');
})->form(function ()
{
	FormItem::text('title', 'Title')->required();
	FormItem::textAddon('price', 'Price')->addon('$')->placement('after')->required();
});