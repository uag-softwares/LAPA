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


Route::get('/auth/disciplinas', ['as' => 'auth.disciplinas', 'uses' => 'DisciplinaController@index']);
Route::get('/auth/disciplina/adicionar', ['as' => 'auth.disciplina.adicionar', 'uses' => 'DisciplinaController@adicionar']);
Route::post('/auth/disciplina/salvar', ['as' => 'auth.disciplina.salvar', 'uses' => 'DisciplinaController@salvar']);
Route::get('/auth/disciplina/editar/{id}', ['as' => 'auth.disciplina.editar', 'uses' => 'DisciplinaController@editar']);
Route::put('/auth/disciplina/atualizar/{id}', ['as' => 'auth.disciplina.atualizar', 'uses' => 'DisciplinaController@atualizar']);
Route::get('/auth/disciplina/deletar/{id}', ['as' => 'auth.disciplina.deletar', 'uses' => 'DisciplinaController@deletar']);


Route::get('/auth/postagens', ['as' => 'auth.postagens', 'uses' => 'PostagemController@index']);
Route::get('/auth/postagem/adicionar', ['as' => 'auth.postagem.adicionar', 'uses' => 'PostagemController@adicionar']);
Route::post('/auth/postagem/salvar', ['as' => 'auth.postagem.salvar', 'uses' => 'PostagemController@salvar']);
Route::get('/auth/postagem/editar/{id}', ['as' => 'auth.postagem.editar', 'uses' => 'PostagemController@editar']);
Route::put('/auth/postagem/atualizar/{id}', ['as' => 'auth.postagem.atualizar', 'uses' => 'PostagemController@atualizar']);
Route::get('/auth/postagem/deletar/{id}', ['as' => 'auth.postagem.deletar', 'uses' => 'PostagemController@deletar']);

