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
Route::get('/gerenciar', ['as' => 'auth.gerenciar', 'uses' => 'HomeController@home'], function () {});

Auth::routes();


Route::middleware(['auth'])->group(function () {

	Route::get('/auth/registros',['as'=> 'auth.registros','uses'=> 'Auth\RegisterController@index'],function () {});
  	Route::get('/auth/registros/editar',['as'=> 'auth.registros.editar','uses'=> 'Auth\RegisterController@editar'],function () {});
   	Route::any('/auth/registros/atualizar',['as'=> 'auth.registros.atualizar','uses'=> 'Auth\RegisterController@atualizar'],function () {});
   	Route::get('/auth/registros/deletar/{id}',['as'=> 'auth.registros.deletar','uses'=> 'Auth\RegisterController@deletar'],function () {});

	
	Route::get('/auth/disciplinas', ['as' => 'auth.disciplinas', 'uses' => 'DisciplinaController@index'], function () {});
	Route::get('/auth/disciplina/adicionar', ['as' => 'auth.disciplina.adicionar', 'uses' => 'DisciplinaController@adicionar'],function () {});
	Route::post('/auth/disciplina/salvar', ['as' => 'auth.disciplina.salvar', 'uses' => 'DisciplinaController@salvar'],function () {});
	Route::get('/auth/disciplina/editar/{id}', ['as' => 'auth.disciplina.editar', 'uses' => 'DisciplinaController@editar'],function () {});
	Route::put('/auth/disciplina/atualizar/{id}', ['as' => 'auth.disciplina.atualizar', 'uses' => 'DisciplinaController@atualizar'],function () {});
	Route::get('/auth/disciplina/deletar/{id}', ['as' => 'auth.disciplina.deletar', 'uses' => 'DisciplinaController@deletar'],function () {});

	Route::get('/auth/postagens', ['as' => 'auth.postagens', 'uses' => 'PostagemController@index'], function () {});
	Route::get('/auth/postagem/adicionar', ['as' => 'auth.postagem.adicionar', 'uses' => 'PostagemController@adicionar'], function () {});
	Route::post('/auth/postagem/salvar', ['as' => 'auth.postagem.salvar', 'uses' => 'PostagemController@salvar'], function () {});
	Route::get('/auth/postagem/editar/{id}', ['as' => 'auth.postagem.editar', 'uses' => 'PostagemController@editar'], function () {});
	Route::put('/auth/postagem/atualizar/{id}', ['as' => 'auth.postagem.atualizar', 'uses' => 'PostagemController@atualizar'], function () {});
	Route::get('/auth/postagem/deletar/{id}', ['as' => 'auth.postagem.deletar', 'uses' => 'PostagemController@deletar'], function () {});

	Route::get('/auth/categorias', ['as' => 'auth.categorias', 'uses' => 'CategoriaController@index'], function () {});
	Route::get('/auth/categoria/adicionar', ['as' => 'auth.categoria.adicionar', 'uses' => 'CategoriaController@adicionar'], function () {});
	Route::post('/auth/categoria/salvar', ['as' => 'auth.categoria.salvar', 'uses' => 'CategoriaController@salvar'], function () {});
	Route::get('/auth/categoria/editar/{id}', ['as' => 'auth.categoria.editar', 'uses' => 'CategoriaController@editar'], function () {});
	Route::put('/auth/categoria/atualizar/{id}', ['as' => 'auth.categoria.atualizar', 'uses' => 'CategoriaController@atualizar'], function () {});
	Route::get('/auth/categoria/deletar/{id}', ['as' => 'auth.categoria.deletar', 'uses' => 'CategoriaController@deletar'], function () {});

	Route::get('/auth/atlas', ['as' => 'auth.atlas', 'uses' => 'AtlaController@index'], function () {});
	Route::get('/auth/atla/adicionar', ['as' => 'auth.atla.adicionar', 'uses' => 'AtlaController@adicionar'], function () {});
	Route::post('/auth/atla/salvar', ['as' => 'auth.atla.salvar', 'uses' => 'AtlaController@salvar'], function () {});
	Route::get('/auth/atla/editar/{id}', ['as' => 'auth.atla.editar', 'uses' => 'AtlaController@editar'], function () {});
	Route::put('/auth/atla/atualizar/{id}', ['as' => 'auth.atla.atualizar', 'uses' => 'AtlaController@atualizar'], function () {});
	Route::get('/auth/atla/deletar/{id}', ['as' => 'auth.atla.deletar', 'uses' => 'AtlaController@deletar'], function () {});
        
	Route::get('/auth/materiais', ['as' => 'auth.materiais', 'uses' => 'MaterialController@index'], function () {});
	Route::get('/auth/materiais/adicionar', ['as' => 'auth.material.adicionar', 'uses' => 'MaterialController@adicionar'], function () {});
	Route::post('/auth/materiais/salvar', ['as' => 'auth.material.salvar', 'uses' => 'MaterialController@salvar'], function () {});
	Route::get('/auth/materiais/editar/{id}', ['as' => 'auth.material.editar', 'uses' => 'MaterialController@editar'], function () {});
	Route::put('/auth/materiais/atualizar/{id}', ['as' => 'auth.material.atualizar', 'uses' => 'MaterialController@atualizar'], function () {});
	Route::get('/auth/materiais/deletar/{id}', ['as' => 'auth.material.deletar', 'uses' => 'MaterialController@deletar'], function () {});

  
	Route::get('/auth/visitas', ['as' => 'auth.visitas', 'uses' => 'VisitaController@index'], function() {});
	Route::get('/auth/visita/adicionar', ['as' => 'auth.visita.adicionar', 'uses' => 'VisitaController@adicionar'], function() {});
	Route::post('/auth/visita/salvar', ['as' => 'auth.visita.salvar', 'uses' => 'VisitaController@salvar'], function() {});
	Route::get('/auth/visita/ver/{id}', ['as' => 'auth.visita.ver', 'uses' => 'VisitaController@ver'], function() {});
	Route::put('/auth/visitas/atualizar/{id}', ['as' => 'auth.visita.atualizar', 'uses' => 'VisitaController@atualizar'], function() {});
	Route::get('/auth/visitas/deletar/{id}', ['as' => 'auth.visita.deletar', 'uses' => 'VisitaController@deletar'], function() {});
});

Route::get('/home', 'HomeController@index')->name('home');

