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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


//http://127.0.0.1:8000/api/contatos
//Route::resource('contatos', ContatoController::class);

//http://127.0.0.1:8000/api/contatos
Route::get('contatos', 'App\Http\Controllers\ContatoController@index');
Route::get('contatos/{id}', 'App\Http\Controllers\ContatoController@show');
Route::post('contatos', 'App\Http\Controllers\ContatoController@store');
Route::put('contatos/{id}', 'App\Http\Controllers\ContatoController@update');
Route::delete('contatos/{id}', 'App\Http\Controllers\ContatoController@destroy');

Route::post('login', 'App\Http\Controllers\Api\AuthController@login');

Route::group(['middleware' => 'apiJwt'], function () {

    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');
    Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');

    Route::get('users', 'App\Http\Controllers\Api\UserController@index');
});
