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
    Route::post('/comment/{post}', 'PostController@addComment')->name('comment');
    Route::get('/like/{post}',   'PostController@like')->name('like');
});

Route::group(['prefix' => 'like', 'as' =>'like.'], function () {
   
    Route::get('/store/{model}',   'likeController@store')->name('store');

});



Route::get('shared/{shareable_link}', ['middleware' => 'shared'], function (\Sassnowski\LaravelShareableModel\Shareable\ShareableLink $link) {
    return $link->shareable;
})->name('shared');


Auth::routes();
Route::get('/{slu}','UserController@show')->name('slug');