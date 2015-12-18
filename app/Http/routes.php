<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Static Pages */

Route::get('/', 'HomeController@index');
Route::post('/', ['uses' => 'HomeController@approvePopup', 'as' => 'approveHomePopup']);

Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::post('contact', ['uses' => 'ContactController@create', 'as' => 'contactCreate']);

Route::get('/friends-club', 'FriendsController@index' );
Route::get('/friends-club/register', ['uses' => 'FriendsController@register', 'as' => 'friends_club_register']);
Route::post('/friends-club/register', ['uses' => 'FriendsController@create', 'as' => 'member_create']);

Route::get('menu', ['uses' => 'MenuController@index', 'as' => 'menu']);
Route::post('menu', ['uses' => 'MenuController@authUser', 'as' => 'authUser']);

Route::get('cart', ['uses' => 'CartController@index', 'as' => 'cart', /*'middleware' => 'authEmptyCart'*/]);

Route::put('auth', ['uses' => 'AuthController@checkPhone', 'as' => 'auth']);