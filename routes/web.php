<?php

use Illuminate\Support\Facades\Route;
use app\http\Controllers\PokedexController;

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

Route::get('/', 'App\Http\Controllers\PokedexController@Index');
Route::get('/{id}', 'App\Http\Controllers\PokedexController@Detalhe');
