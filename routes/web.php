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

Route::get('/', 'RouterController@home')->name('/');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('get:logout');



Route::get('/store', 'RouterController@store')->name('store');

Route::get('/contact', 'RouterController@contact')->name('contact');

Route::get('/tracking', 'RouterController@tracking')->name('tracking');

Route::get('/item', 'RouterController@item')->name('item');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::get('/likes', 'RouterController@likes')->name('likes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/cart/add/{id}', 'CartController@cartAdd')->name('cartAdd');
