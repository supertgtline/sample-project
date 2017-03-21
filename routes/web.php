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

Route::get('test', 'TestController@index')->middleware(['auth', 'throttle']);
Auth::routes();

Route::get('/admin','AdminController@index')->name('admin');

Route::get('terms-of-service', 'PagesController@terms');

Route::get('privacy','PagesController@privacy');

Route::get('/', 'PagesController@index');
Route::get('widget/create', 'WidgetController@create')->name('widget.create');

Route::get('widget/{widget}-{slug?}','WidgetController@show')->name('widget.show');
Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);
Route::patch('widget/{widget}', 'WidgetController@update');

// socialite routes
// 
Route::get('auth/{provider}','Auth\AuthController@uthController@redirectToProvider');

Route::get('auth/{provider}/callback','Auth\AuthController@handleProviderCallback');

Route::get('/', 'PagesController@index')->name('home');

