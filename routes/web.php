<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/buku','App\Http\Controllers\BukuController@index')->name('.index');
route::get('/buku/create','App\Http\Controllers\BukuController@create')->name('create');
route::post('/buku/store','App\Http\Controllers\BukuController@store')->name('store');
route::get('/buku/show/{id}','App\Http\Controllers\BukuController@show')->name('show');
route::get('/buku/edit/{id}','App\Http\Controllers\BukuController@edit')->name('edit');
route::post('/buku/update/{id}','App\Http\Controllers\BukuController@update')->name('update');
route::delete('/buku/delete{id}','App\Http\Controllers\BukuController@delete')->name('delete');






