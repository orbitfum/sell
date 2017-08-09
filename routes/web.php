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
Route::get('/', 'PageController@index');

Route::get('cjson', 'PageController@catsJson');
Route::get('cornjon/dsaodasopkdoakoerqwmczxcksdfoddolr', 'PageController@updtaedolar');

#ebay
Route::get('ifram/ebay/{id}', 'PageController@getifame');



Route::group(['prefix' => 'user' ],function () {
    Route::post('register', 'UserController@register');
    Route::post('login', 'UserController@login');

});

Route::group(['prefix' => 'ebay' ],function () {
    Route::get('search', 'PageController@search');
    Route::get('addCart', 'PageController@addCart');
    Route::get('{name}/{id}', 'PageController@getItem');
    Route::get('{namecat}/{id}/{name}', 'PageController@searchcat');
});

#cart
Route::group(['prefix' => 'cart' ],function () {
    Route::get('mycart', 'PageController@cart');
});






