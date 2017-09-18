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

Route::get('/',     'HomeController@index')->name('home');
Route::get('/more', 'HomeController@posts')->name('more');


Route::group(['prefix' => 'user', 'as' =>'user.'], function () {
    Route::get('/show/{$slu}',   'UserController@show')->name('show');
    Route::get('/{user}/edit',   'UserController@edit')->name('edit');
    Route::post('/{user}/update','UserController@update')->name('update');
});


Route::group(['prefix' => 'post', 'as' =>'post.'], function () {
    Route::get('/create',        'PostController@create')->name('create');
    Route::get('/show/{post}',   'PostController@show')->name('show');
    Route::post('/store',        'PostController@store')->name('store');
    Route::get('/like/{post}',   'PostController@like')->name('like');
});

Route::group(['prefix' => 'like', 'as' =>'like.'], function () {
    Route::get('/store/user/{user}',       'LikeController@storeForUser')->name('store.user');
    Route::get('/store/post/{post}',       'LikeController@storeForPost')->name('store.post');
    Route::get('/store/comment/{comment}', 'LikeController@storeForComment')->name('store.comment');
});

Route::group(['prefix' => 'denunciation', 'as' =>'denunciation.'], function () {
    Route::post('/store/user/{user}',       'DenunciationController@storeForUser')->name('store.user');
    Route::post('/store/post/{post}',       'DenunciationController@storeForPost')->name('store.post');
    Route::post('/store/comment/{comment}', 'DenunciationController@storeForComment')->name('store.comment');
});

Route::group(['prefix' => 'comment', 'as' =>'comment.'], function () {
    Route::post('/store/post/{post}',      'commentController@storeForPost')->name('store.post');
    Route::post('/store/comment/{comment}','commentController@storeForComment')->name('store.comment');
});

Auth::routes();
Route::get('/{slu}','UserController@show')->name('slug');