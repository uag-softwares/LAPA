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

Route::get('/',['as'=> 'site.home','uses'=> 'HomeController@home'],function () {});

Auth::routes();


Route::middleware(['auth'])->group(function () {

	Route::get('/auth/registros',['as'=> 'auth.registros','uses'=> 'Auth\RegisterController@index'],function () {});
  	Route::get('/auth/registros/editar',['as'=> 'auth.registros.editar','uses'=> 'Auth\RegisterController@editar'],function () {});
   	Route::any('/auth/registros/atualizar',['as'=> 'auth.registros.atualizar','uses'=> 'Auth\RegisterController@atualizar'],function () {});
   	Route::get('/auth/registros/deletar/{id}',['as'=> 'auth.registros.deletar','uses'=> 'Auth\RegisterController@deletar'],function () {});
   

	   
});

Route::get('/auth/disciplinas', ['as' => 'auth.disciplinas', 'uses' => 'DisciplinaController@index'], function () {});
Route::get('/auth/disciplina/adicionar', ['as' => 'auth.disciplina.adicionar', 'uses' => 'DisciplinaController@adicionar'],function () {});
Route::post('/auth/disciplina/salvar', ['as' => 'auth.disciplina.salvar', 'uses' => 'DisciplinaController@salvar'],function () {});
Route::get('/auth/disciplina/editar/{id}', ['as' => 'auth.disciplina.editar', 'uses' => 'DisciplinaController@editar'],function () {});
Route::put('/auth/disciplina/atualizar/{id}', ['as' => 'auth.disciplina.atualizar', 'uses' => 'DisciplinaController@atualizar'],function () {});
Route::get('/auth/disciplina/deletar/{id}', ['as' => 'auth.disciplina.deletar', 'uses' => 'DisciplinaController@deletar'],function () {});

Route::get('/home', 'HomeController@index')->name('home');