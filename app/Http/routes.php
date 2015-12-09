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

Route::get('about', 'AboutController@index');
Route::get('contact', 'ContactController@index');
Route::post('contact', ['uses' => 'ContactController@create', 'as' => 'contactCreate']);

Route::post('/', ['uses' => 'HomeController@approvePopup', 'as' => 'approveHomePopup']);

Route::get('/friends-club', 'FriendsController@index' );
Route::get('/friends-club/register', ['uses' => 'FriendsController@register', 'as' => 'friends_club_register']);