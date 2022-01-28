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

Route::post('v1/getAllRegisters',  'GetRegisters@getAllRegisters')->name('api.getRegisters');

Route::get('v1/new_data', 'Api\Cadastro_Temperatura@cadastro_Banco')->name('api.new_register');

Route::post('v1/getAsc', 'GetRegisters@getAllRegisters1')->name('api.getAsc');
