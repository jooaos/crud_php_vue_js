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

Route::get('/pessoas', 'PessoasController@index')->name('pessoas.index');
Route::post('/pessoas', 'PessoasController@store')->name('pessoas.store');
Route::put('/pessoas/{pessoas}', 'PessoasController@update')->name('pessoas.update');
