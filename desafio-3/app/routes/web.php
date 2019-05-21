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

//Listagem
Route::get('/index', 'IndexController@index');
//Add Form - Save User
Route::get('/add', 'IndexController@add');
Route::post('/store', 'IndexController@storeUsers');

//Edit Form - Update User
Route::get('/edit/{id}', 'IndexController@toEdit');
Route::post('/update/{id}', 'IndexController@storeEdit');

//Delete
Route::get('/delete/{id}', 'IndexController@destroy');