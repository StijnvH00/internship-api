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

Route::prefix('internships')->middleware('auth:api')->group(function () {
    Route::post('', 'InternshipController@store');
    Route::get('', 'InternshipController@index');

    Route::get('/{internship}','InternshipController@show');
    Route::put('/{internship}', 'InternshipController@update');
    Route::delete('/{internship}', 'InternshipController@destroy');
});