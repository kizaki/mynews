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
    return view('welcome');
});

// いくつかのRoutingの設定をgroup化する
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
   Route::get('news/create', 'Admin\NewsController@add');
   Route::post('news/create', 'Admin\NewsController@create'); # 追記
   Route::get('profile/create', 'Admin\ProfileController@add');
   Route::post('profile/create', 'Admin\ProfileController@create'); #追記：20200915
   Route::get('profile/edit', 'Admin\ProfileController@edit');
   Route::post('profile/edit', 'Admin\ProfileController@update'); #追記：20200915
   Route::get('news', 'Admin\NewsController@index'); # 追記：20200918
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
