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
Route::group(['prefix' => 'admin'], function(){
   Route::get('news/create', 'Admin\NewsController@add')->middleware('auth'); // 修正:bug fix 20200919 木崎
   Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth'); // 修正：20200914 木
   Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth'); // 修正：20200910 木崎
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
