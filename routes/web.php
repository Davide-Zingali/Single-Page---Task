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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rotta home che mostra i task
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Rotta per dettagli task
Route::get('/show_tasks/{id}', 'HomeController@show')->name('show')->middleware(['auth', 'auth.user.logged']);

// Rotta per aggiungere nuovi task
Route::get('/create', 'HomeController@create')->name('create')->middleware('auth');
Route::post('/store', 'HomeController@store')->name('store')->middleware('auth');

// Rotta per editare i task
Route::get('/edit/{id}', 'HomeController@edit')->name('edit')->middleware('auth');
Route::post('/update/{id}', 'HomeController@update')->name('update')->middleware('auth');
