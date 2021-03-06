<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "App\Http\Controllers\TaskController@index");
Route::post('/create', "App\Http\Controllers\TaskController@create")->name('create');
Route::post('/update/{id}', "App\Http\Controllers\TaskController@update")->name('update');
Route::post('/delate/{id}', "App\Http\Controllers\TaskController@delate")->name('delate');
Route::get('/search', "App\Http\Controllers\TaskController@search")->name('search');
