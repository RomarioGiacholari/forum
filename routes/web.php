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



Auth::routes();

Route::get('/', 'ThreadController@index');
Route::get('/threads','ThreadController@index');
Route::get('/threads/create','ThreadController@create');
Route::post('/threads','ThreadController@store');
Route::get('/threads/{channel}/{thread}','ThreadController@show');

Route::get('/threads/{channel}','ChannelController@index');

Route::post('/threads/{channel}/{thread}/replies','ReplyController@store');

Route::post('replies/{reply}/favorites', 'FavoriteController@store');

Route::get('profiles{user}', 'ProfileController@show');
