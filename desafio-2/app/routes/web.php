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

//Listagem Inicial
Route::get('/', 'HomeController@index');

//Filtro de Pesquisa
Route::get('/search', 'HomeController@search');

//Paginação
Route::get('/paginator', 'HomeController@paginator');
