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

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
Route::get('news/create','Admin\NewsController@add');
Route::post('news/create', 'Admin\NewsController@create'); # 追記

Route::get('profile/create','Admin\ProfileController@add')->middleware('auth');
Route::post('profile/create','Admin\ProfileController@create');
Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
Route::post('profile/edit','Admin\ProfileController@update');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth'); // 追記
    Route::get('news/edit','Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit','Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
    
});
Route::get('/','NewsController@index');
Route::get('/profile','ProfileController@index');
