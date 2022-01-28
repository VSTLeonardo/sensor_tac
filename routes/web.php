<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views\MakeViews;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [MakeViews::class, 'viewLogin'])->name('login');

Route::get('/medicoes', 'Views\MakeViews@med')->name('medicoes');

Route::get('/medicoes/{sub}', 'Views\MakeViews@makeViewDadosSub')->name('getviewmedicoes');

Route::get('/dashboard', 'Views\Dashboard@dashboard')->name('dashboard');

Route::get('/logout', 'MakeLogin@logout')->name('logout');

Route::post('/logon', 'MakeLogin@makeLogin')->name('api.login');

Route::get('/teste', 'GetData@getDataWithSub');

Route::get('/lista', 'Views\MakeViews@listagem')->name('listagem');

Route::get('/vvv', 'MakeCsv@export')->name('csv');


