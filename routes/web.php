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

Route::get('/', function () {
    return view('home');
})->name('/');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('/store', function () {
    return view('store');
})->name('store');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/tracking', function () {
    return view('tracking');
})->name('tracking');

Route::get('/item', function () {
    return view('item');
})->name('item');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');
