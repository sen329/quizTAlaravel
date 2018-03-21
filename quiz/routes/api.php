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

Route::get('/user', "userController@all");
Route::get('/user/{id}', "userController@find");
Route::post('/user',"userController@register");
Route::delete('/user/{id}', "userController@delete");
Route::patch('/user/{id}', "userController@updateUser");

Route::get('/items', "itemController@all");
Route::get('/items/{id}', "itemController@finditem");
Route::post('/items',"itemController@register");
Route::delete('/items/{id}', "itemController@delete");
Route::patch('/items/{id}', "itemController@updateItem");
