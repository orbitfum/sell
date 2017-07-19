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
Route::get('ebay/search', 'PageController@search');
Route::get('cornjon/dsaodasopkdoakoerqwmczxcksdfoddolr', 'PageController@updtaedolar');
Route::get('ebay/{name}/{id}', 'PageController@getItem');
Route::get('ebay/addcart', 'PageController@addCart');
Route::get('ifram/ebay/{id}', 'PageController@getifame');





