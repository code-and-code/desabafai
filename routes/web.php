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
    Route::get('/create',           'PostController@create')->name('create');
    Route::post('/store',           'PostController@store')->name('store');
    Route::get('/show/{post}',      'PostController@show')->name('show');
    Route::get('/edit/{post}',      'PostController@edit')->name('edit');
    Route::get('/update/{post}',      'PostController@update')->name('update');
    Route::delete('/destroy/{post}','PostController@destroy')->name('destroy');
});

Route::group(['prefix' => 'like', 'as' =>'like.'], function () {
    Route::post('/store/user/{user}',       'LikeController@storeForUser')->name('store.user');
    Route::post('/store/post/{post}',       'LikeController@storeForPost')->name('store.post');
    Route::post('/store/comment/{comment}', 'LikeController@storeForComment')->name('store.comment');
});

Route::group(['prefix' => 'denunciation', 'as' =>'denunciation.'], function () {
    Route::post('/store/user/{user}',       'DenunciationController@storeForUser')->name('store.user');
    Route::post('/store/post/{post}',       'DenunciationController@storeForPost')->name('store.post');
    Route::post('/store/comment/{comment}', 'DenunciationController@storeForComment')->name('store.comment');
});

Route::group(['prefix' => 'comment', 'as' =>'comment.'], function () {
    Route::post('/store/post/{post}',      'CommentController@storeForPost')->name('store.post');
    Route::post('/store/comment/{comment}','CommentController@storeForComment')->name('store.comment');
    Route::delete('/destroy/{comment}',    'CommentController@destroy')->name('destroy');
});

Auth::routes();
Route::get('/{slu}','UserController@show')->name('slug');