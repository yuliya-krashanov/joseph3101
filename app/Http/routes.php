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
Route::post('menu/product', ['uses' => 'MenuController@singleProduct', 'as' => 'single_product']);
Route::post('menu/ingredient', ['uses' => 'MenuController@singleIngredient', 'as' => 'single_ingredient']);
Route::post('menu/add-to-go', ['uses' => 'MenuController@addToGoPopup', 'as' => 'add_to_go_popup']);
Route::post('menu/comment', ['uses' => 'MenuController@commentPopup', 'as' => 'comment_popup']);
Route::put('menu/comment', ['uses' => 'MenuController@saveComment', 'as' => 'comment_save']);

Route::get('cart', ['uses' => 'CartController@index', 'as' => 'cart', /*'middleware' => 'authEmptyCart'*/]);
Route::post('cart/add', ['uses' => 'CartController@add', 'as' => 'add_to_cart', /*'middleware' => 'authEmptyCart'*/]);

Route::get('order/card', ['uses' => 'OrderController@index', 'as' => 'checkout_card', /*'middleware' => 'authEmptyCart'*/]);

Route::post('auth', ['uses' => 'Auth\AuthController@authUser', 'as' => 'authUser']);
Route::put('auth', ['uses' => 'Auth\AuthController@checkPhone', 'as' => 'checkExistPhone']);
Route::post('/auth/check', function(Request $request){
    return (Auth::check()) ? 1 : 0;
});