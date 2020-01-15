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

Route::get('/', 'PageController@home');
Route::get('/gallery', 'PageController@gallery');
Route::get('/privacy', 'PageController@privacy');
Route::get('/result/{filename}', 'PageController@result');
Route::get('/shop/{filename}', 'PageController@shop');
Route::get('/checkout/success', 'PageController@checkout_success');
Route::get('/checkout/cancel', 'PageController@checkout_cancel');

Route::post('/generate_logo', 'PageController@generate_logo');
Route::post('/check_for_img', 'PageController@check_for_img');
Route::post('/checkout', 'PageController@checkout');
