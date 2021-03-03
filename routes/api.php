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


//http://127.0.0.1:8000/api/contatos
//Route::resource('contatos', ContatosController::class);

//http://127.0.0.1:8000/api/contatos
Route::get('contatos', 'App\Http\Controllers\ContatosController@index');
Route::get('contatos/{id}', 'App\Http\Controllers\ContatosController@show');
Route::post('contatos', 'App\Http\Controllers\ContatosController@store');
Route::put('contatos/{id}', 'App\Http\Controllers\ContatosController@update');
Route::delete('contatos/{id}', 'App\Http\Controllers\ContatosController@destroy');
