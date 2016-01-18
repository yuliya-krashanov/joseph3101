<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

//use User;

//Admin::menu()->url('/')->icon('fa-dashboard')->uses('\App\Http\Controllers\AdminController@dashboard');
//SleepingOwl\Admin\Controllers\

//Admin::menu()->url('/')->label('Start Page')->icon('fa-dashboard');//->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu(\App\Sale::class)->icon('fa-user');
//Admin::menu(\App\Product::class)->icon('fa-shopping-cart');
Admin::menu(\App\Category::class)->icon('fa-shopping-cart');
Admin::menu(\App\AdditionalCategory::class)->icon('fa-shopping-cart');
Admin::menu(\App\Ingredient::class)->icon('fa-shopping-cart');
//Admin::menu()->label('Sales/Coupons')->icon('fa-book')->items(function ()
//{
//    Admin::menu(\App\Sale::class)->icon('fa-user');
//});