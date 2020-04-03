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

Route::get('/', 'HomePageController@home')->name('/');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('get:logout');



Route::get('/store', 'StoreController@store')->name('store');

Route::get('/store/{id}', 'ItemPageController@itemPage')->name('item');




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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomePageController@home')->name('home');

Route::get('/cart/add/{id}', 'CartController@cartAdd')->name('cartAdd');

Route::get('/cart/remove/{id}', 'CartController@cartRemove')->name('cartRemove');

Route::get('/checkout', 'OrderController@checkout')->name('checkout');
Route::get('/confirmation', function () {
	return view('confirmation');
});


Route::get('/verify/{id}', 'Auth\VerificationController@send')->name('verifyPage');

Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('verify');


Route::get('/users/{id}', 'UserController@userProfile')->name('profile');
Route::post('/user/{id}/save', 'UserController@saveChanges')->name('saveUserChanges');
Route::get('/users/{id}/chat', 'UserController@chat')->name('chat');

Route::get('/admin/chat', 'UserController@adminChat')->name('adminChat');
//--------------AJAX-запросы---------------

Route::get('/ajax', 'StoreController@ajaxItems');

Route::get('/search', 'StoreController@search');

Route::get('/cart/add', 'CartController@cartAdd');

Route::get('/cart/removeWithoutCount', 'CartController@cartRemoveWithoutCount');

Route::get('/cart/remove', 'CartController@cartRemove');

Route::get('/likes/add', 'LikesController@likesAdd');

Route::get('/likes/remove', 'LikesController@likesRemove');

Route::get('/moreMessages', 'UserController@moreMessages');

Route::get('/admin/moreMessages', 'UserController@moreMessagesForAdmin');

Route::get('/admin/getDialog', 'UserController@getDialog');

Route::post('/admin/chat/send', 'UserController@sendMessageFromAdmin');

Route::post('/chat/send', 'UserController@sendMessageFromUser');
