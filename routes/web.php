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

Route::get('/configUser', 'UserController@config')->name('user.config');
Route::post('/configUser', 'UserController@edit')->name('user.edit');


Route::get('/createTicket', 'TicketController@create')->name('create.ticket');
Route::post('/createTicket', 'TicketController@save')->name('save.ticket');
Route::get('/ticket/{id}', 'TicketController@getTicket')->name('get.ticket');
Route::get('/ticket/categories/{id}', 'TicketController@ticketByCategory')->name('ticket.category');
Route::get('/ticketUser', 'TicketController@ticketByUser')->name('ticket.user');
Route::get('/ticketDelete/{id}', 'TicketController@delete')->name('ticket.delete');


Route::get('/createCategory', 'CategoryController@create')->name('create.category');
Route::post('/createCategory', 'CategoryController@save')->name('save.category');
Route::get('/categories', 'CategoryController@all')->name('get.categories');
