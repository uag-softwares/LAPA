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


Route::middleware(['auth'])->group(function () {

	Route::get('/auth/registros',['as'=> 'auth.registros','uses'=> 'Auth\RegisterController@index'],function () {});
  	Route::get('/auth/registros/editar',['as'=> 'auth.registros.editar','uses'=> 'Auth\RegisterController@editar'],function () {});
   	Route::any('/auth/registros/atualizar',['as'=> 'auth.registros.atualizar','uses'=> 'Auth\RegisterController@atualizar'],function () {});
   	Route::get('/auth/registros/deletar/{id}',['as'=> 'auth.registros.deletar','uses'=> 'Auth\RegisterController@deletar'],function () {});
   
});

Route::get('/home', 'HomeController@index')->name('home');
