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

Route::get('/timeline', 'PostController@index');
Route::post('/add-posts', 'PostController@create')->name('posts.create')->middleware('auth');
Route::post('delete/{id}', 'PostController@destroy')->name('{id}')->middleware('auth');

Route::get('/{username}', 'ProfileController@show')->name('profile');
Route::get('/add-friends/{username}', 'UserController@addfriendsRequeste')->middleware('auth');
Route::post('/friends-accept', 'UserController@FriendsAccept')->middleware('auth')->name('friends.accept');
Route::get('/remove-friends/{username}', 'UserController@removefriends')->middleware('auth');

Route::get('/like/{post}', 'PostController@like')->middleware('auth');
Route::get('/remove-like/{post}', 'PostController@removelike')->middleware('auth');

Route::get('/friends/{username}', 'ProfileFriendsController@friends')->name('profile');
Route::post('/add-reply', 'RepliesController@create')->name('replys.create')->middleware('auth');

