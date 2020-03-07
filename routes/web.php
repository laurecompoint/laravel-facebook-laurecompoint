<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('account', 'UserController@show')->name('profile.show');
Route::post('account-update', 'UserController@update')->middleware('auth')->name('account.update');

Route::post('compteuser', 'UserController@destroy')->middleware('auth')->name('compte.destroyuser');

Route::post('compteuser-avatar', 'UserController@destroyavatar')->middleware('auth')->name('compte.destroyavatar');

Route::get('/home', 'HomeController@index')->name('home');
