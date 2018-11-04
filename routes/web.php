<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@doLogin');
Route::get('/logout', 'LoginController@logout');

Route::post('/register', 'UserController@store');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store');
Route::delete('/cart/{id}', 'CartController@destroy');

Route::post('/buy', 'BuyController@store');

Route::get('/{advertId}', 'AdvertController@show');
Route::get('/', 'AdvertController@index');

