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

Route::get('/', 'IndexController@home')->name('/');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('get:logout');



Route::get('/store', 'IndexController@store')->name('store');

Route::get('/store/{id}', 'ItemPageController@itemPage')->name('item');

Route::get('/itt', function () {
	return view('item');
});

Route::get('/user/?',function($name){
  echo "Name: ".$name;
});

Route::post('/store/{id}/commentAdd', 'ItemPageController@commentAdd')->name('commentAdd');

Route::post('/store/{id}/reviewAdd', 'ItemPageController@reviewAdd')->name('reviewAdd');

Route::get('/contact', 'IndexController@contact')->name('contact');

Route::get('/tracking', 'OrderController@trackingPage')->name('tracking');

Route::get('/item', 'IndexController@item');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::get('/likes', 'LikesController@likes')->name('likes');

Route::get('/tracking/{id}', 'OrderController@orderPage')->name('order');

Route::get('/likes/add/{id}', 'LikesController@likesAdd')->name('likesAdd');

Route::get('/likes/remove/{id}', 'LikesController@likesRemove')->name('likesRemove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart/add/{id}', 'CartController@cartAdd')->name('cartAdd');

Route::get('/cart/remove/{id}', 'CartController@cartRemove')->name('cartRemove');
