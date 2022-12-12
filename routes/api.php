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

// Route::get('hello/{name}', 'App\Http\Controllers\HelloWorldController@hello');

// Route::post('hello-post/{name}', 'App\Http\Controllers\HelloWorldController@hello');

Route::get('bands', 'App\Http\Controllers\BandController@getAll');
Route::get('bands/{id}', 'App\Http\Controllers\BandController@getById');
Route::get('bands/gender/{gender}', 'App\Http\Controllers\BandController@getByGender');
Route::post('bands/store', 'App\Http\Controllers\BandController@store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
