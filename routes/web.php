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


Route::get('/admin/disciplinas', ['as' => 'admin.disciplinas', 'uses' => 'DisciplinaController@index']);
Route::get('/admin/disciplina/adicionar', ['as' => 'admin.disciplina.adicionar', 'uses' => 'DisciplinaController@adicionar']);
Route::post('/admin/disciplina/salvar', ['as' => 'admin.disciplina.salvar', 'uses' => 'DisciplinaController@salvar']);
Route::get('/admin/disciplina/editar/{id}', ['as' => 'admin.disciplina.editar', 'uses' => 'DisciplinaController@editar']);
Route::put('/admin/disciplina/atualizar/{id}', ['as' => 'admin.disciplina.atualizar', 'uses' => 'DisciplinaController@atualizar']);
Route::get('/admin/disciplina/deletar/{id}', ['as' => 'admin.disciplina.deletar', 'uses' => 'DisciplinaController@deletar']);


Route::get('/admin/postagens', ['as' => 'admin.postagens', 'uses' => 'PostagemController@index']);
Route::get('/admin/postagem/adicionar', ['as' => 'admin.postagem.adicionar', 'uses' => 'PostagemController@adicionar']);
Route::post('/admin/postagem/salvar', ['as' => 'admin.postagem.salvar', 'uses' => 'PostagemController@salvar']);
Route::get('/admin/postagem/editar/{id}', ['as' => 'admin.postagem.editar', 'uses' => 'PostagemController@editar']);
Route::put('/admin/postagem/atualizar/{id}', ['as' => 'admin.postagem.atualizar', 'uses' => 'PostagemController@atualizar']);
Route::get('/admin/postagem/deletar/{id}', ['as' => 'admin.postagem.deletar', 'uses' => 'PostagemController@deletar']);

