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


Route::get('/post',                 'PostController@index');
Route::post('/post',                'PostController@store');
Route::put('/post/{id}',            'PostController@update');
Route::delete('/post/{id}',         'PostController@destroy');
Route::get('/post/toggleLike/{id}',      'PostController@toggleLike');

Route::post('/register','Auth\RegisterController@register')->name('api.register');

