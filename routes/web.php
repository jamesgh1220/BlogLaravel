<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/createTicket', 'TicketController@create')->name('create.ticket');

Route::get('/createCategory', 'CategoryController@create')->name('create.category');
Route::post('/createCategory', 'CategoryController@save')->name('save.category');
