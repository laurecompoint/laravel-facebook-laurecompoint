<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/search', 'UserController@search')->middleware('auth');
Auth::routes();

Route::get('account', 'UserController@show')->name('profile.show');

Route::post('account-update', 'UserController@update')->middleware('auth')->name('account.update');

Route::post('compteuser', 'UserController@destroy')->middleware('auth')->name('compte.destroyuser');

Route::post('compteuser-avatar', 'UserController@destroyavatar')->middleware('auth')->name('compte.destroyavatar');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/timiline', 'PostController@index');
Route::post('/add-posts', 'PostController@create')->name('posts.create')->middleware('auth');

Route::get('/{username}', 'ProfileController@show')->name('profile');