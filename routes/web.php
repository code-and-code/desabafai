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

Route::get('/', 'HomeController@index')->name('home');


Route::group(['prefix' => 'user', 'as' =>'user.'], function () {

    Route::get('/show/{$slu}', 'UserController@show')->name('show');
    Route::get('/{user}/edit',   'UserController@edit')->name('edit');
    Route::post('/{user}/update',   'UserController@update')->name('update');
});


Auth::routes();
Route::get('/{slu}','UserController@show')->name('slug');