<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'tales'], function () {
    Route::get('titles/{lang}', 'TaleController@getTitles');
    Route::get('titles/{lang}/{keyword?}', 'TaleController@getTitlesWithKeyword');
    Route::get('content/{lang}/{uuid}', 'TaleController@getContent');
});
