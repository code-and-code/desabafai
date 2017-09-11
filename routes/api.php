<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();

});


Route::middleware('auth:api')->get('/post',      'PostController@index')->name('post.index');
Route::middleware('auth:api')->post('/post/store','PostController@store')->name('post.store');

Route::post('/register','Auth\RegisterController@register')->name('api.register');

