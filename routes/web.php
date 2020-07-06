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

use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function(){

    Auth::routes([
        'confirm' => false,
        'verify' => false
    ]);

    Route::get('/verify/{user}', 'Auth\VerificationController@send')->name('verifyPage');

    Route::get('/verify/token/{token}', 'Auth\VerificationController@verify')->name('verify');

    Route::get('/', 'BasicController@home')->name('/');

    Route::get('/store', 'StoreController@store')->name('store');

    Route::get('/store/{item}', 'ItemController@item')->name('item');

    Route::get('/contact', 'BasicController@contact')->name('contact');

    Route::get('/cart', 'UserController@cart')->name('cart');

    Route::get('/likes', 'UserController@likes')->name('likes');

    Route::get('/checkout', 'OrderController@checkout')->name('checkout');

    Route::get('/users/{user}', 'UserController@userProfile')->name('profile');

    Route::middleware('auth')->group(function () {
        Route::get('/tracking', 'OrderController@tracking')->name('tracking');

        Route::get('/tracking/{order}', 'OrderController@order')->name('order');

        Route::post('/confirmation', 'OrderController@orderCreate')->name('confirmation');

        Route::get('/users/{user}/chat', 'UserController@chat')->name('chat');
    });

});

//------------------------роуты для которых не нужна локаль--------------------

Route::get('/logout', 'Auth\LoginController@logout')->name('get:logout');

Route::post('/{order}/coupons/set', 'OrderController@setCoupon')->name('setCoupon');

Route::get('/{order}/coupons/remove/{code}', 'OrderController@removeCoupon')->name('removeCoupon');

Route::middleware('auth')->group(function () {
    Route::post('/tracking/{order}/update', 'OrderController@orderUpdate')->name('orderUpdate')->middleware('auth');

    Route::post('/user/{user}/save', 'UserController@saveChanges')->name('saveUserChanges');

    Route::post('/store/{item}/commentAdd', 'ItemController@commentAdd')->name('commentAdd');

    Route::post('/store/{item}/reviewAdd', 'ItemController@reviewAdd')->name('reviewAdd');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/chat', 'UserController@adminChat')->name('adminChat');
    });
});


Route::get('/getRoom', function () {
    return response()->json([
        'room' => Auth::user()->role->title == 'admin' || Auth::user()->role->title == 'support' ? 'support' : Auth::id(),
        'isOrderManager' => Auth::user()->role->title == 'order_manager'
    ]);
});
//--------------AJAX-запросы---------------

Route::get('/search', 'StoreController@search');

Route::post('/search/dialogs', 'UserController@searchTerm');

Route::post('/search/dialogs/get', 'UserController@searchDialogs');

Route::get('/cart/add', 'UserController@cartAdd');
Route::get('/cart/removeWithoutCount', 'UserController@cartRemoveWithoutCount');
Route::get('/cart/remove', 'UserController@cartRemove');

Route::get('/likes/add', 'UserController@likesAdd');
Route::get('/likes/remove', 'UserController@likesRemove');

Route::get('/store/{item}/comments/more', 'ItemController@moreComments');
Route::get('/store/{item}/reviews/more', 'ItemController@moreReviews');
Route::get('/store/{item}/answers/more', 'ItemController@moreAnswers');

Route::get('/moreMessages', 'UserController@moreMessages');

Route::post('/chat/send', 'UserController@sendMessageFromUser');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/moreMessages', 'UserController@moreMessagesForAdmin');

    Route::get('/getDialog', 'UserController@getDialog');

    Route::post('/chat/send', 'UserController@sendMessageFromAdmin');

    Route::get('/isDialogChecked', 'UserController@isDialogChecked');

    Route::get('/dialogChecked', 'UserController@dialogChecked');

    Route::get('/getDialogs', 'UserController@getDialogs');
});



Route::get('locale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если указанная локаль содержит корректную метку языка
    if (isset($segments[1]) && in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку

    }

    if (in_array($lang, App\Http\Middleware\LocaleMiddleware::$languages)) {
        if ($lang !== App\Http\Middleware\LocaleMiddleware::$mainLanguage){
            array_splice($segments, 1, 0, $lang);
        }
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)


    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    $parse = parse_url($referer, PHP_URL_QUERY);
    if($parse){
        $url = $url.'?'. $parse;
    }
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');
