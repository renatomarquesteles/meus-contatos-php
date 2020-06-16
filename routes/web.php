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

Auth::routes();

Route::get('/contacts', 'ContactsController@index');
Route::get('/contacts/new', 'ContactsController@create');
Route::post('/contacts', 'ContactsController@store');
Route::get('/contacts/{contactId}/edit', 'ContactsController@edit');
Route::put('/contacts/{contactId}', 'ContactsController@update');
Route::delete('/contacts/{contactId}', 'ContactsController@destroy');
