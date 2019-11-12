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

Route::post('/students','ApiController@store');

Route::get('/studentsdata','ApiController@show');

Route::get('studentsdata/{id}','ApiController@showbyid');

Route::put('studentsupdate/{id}','ApiController@update');

Route::delete('studentsdelete/{id}','ApiController@delete');

Route::post('register','RegisterController@register');

Route::post('login','LoginController@login');