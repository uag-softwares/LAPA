<?php

use Illuminate\Support\Facades\Route;
use App\Postagem;
use App\Disciplina;
use App\Categoria;
use App\Atla;
use App\Material;
use App\Visita;
use App\Contato;
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


Route::get('/', ['as' => 'site.home', 'uses' => 'PostagemController@siteHome'], function () {});
//Route::get('/',['as'=> 'site.home','uses'=> 'HomeController@gerenciar'],function () {});
Route::get('/site/atlas/index', ['as' => 'site.atlas.index', 'uses' => 'AtlaController@siteIndex'], function () {});
Route::get('/site/atlas/categoria/{categoria:slug}', ['as' => 'site.atlas.categoria', 'uses' => 'AtlaController@atlasPorCategoria'], function (App\Categoria $categoria) {return $categoria;});
Route::get('/site/atlas/disciplina/{disciplina:slug}', ['as' => 'site.atlas.disciplina', 'uses' => 'AtlaController@atlasPorDisciplina'], function (App\Disciplina $disciplina) {return $disciplina;});


Route::get('/site/eventos/index', ['as' => 'site.postagens.indexEvento', 'uses' => 'PostagemController@siteIndexEvento'], function () {});
Route::get('/site/noticias/index', ['as' => 'site.postagens.indexNoticia', 'uses' => 'PostagemController@siteIndexNoticia'], function () {});
Route::get('/site/editais/index', ['as' => 'site.postagens.indexEdital', 'uses' => 'PostagemController@siteIndexEdital'], function () {});

Route::get('/site/eventos/visualizar/{registro:slug}', ['as' => 'site.eventos.visualizar', 'uses' => 'PostagemController@siteVisualizarPostagem'], function (App\Postagem $registro) {return $registro;});

Route::get('/site/editais/visualizar/{registro:slug}', ['as' => 'site.editais.visualizar', 'uses' => 'PostagemController@siteVisualizarPostagem'], function (App\Postagem $registro) {return $registro;});

Route::get('/site/noticias/visualizar/{registro:slug}', ['as' => 'site.noticias.visualizar', 'uses' => 'PostagemController@siteVisualizarPostagem'], function (App\Postagem $registro) {return $registro;});


Route::get('/site/postagem/visualizar/{registro:slug}', ['as' => 'site.postagem.visualizar', 'uses' => 'PostagemController@siteVisualizarPostagem'], function (App\Postagem $registro) {return $registro;});

Route::get('/site/contato/index', ['as' => 'site.contato.index', 'uses' => 'Auth\RegisterController@siteIndex'], function () {});
Route::get('/site/contato/visualizar/{registro:slug}', ['as' => 'site.contato.visualizar', 'uses' => 'Auth\RegisterController@siteRegistervisualizar'], function (App\User $registro) {return $registro;});


Route::get('/site/materiais/index', ['as' => 'site.materiais.index', 'uses' => 'MaterialController@siteIndex'], function () {});
Route::get('/site/materiais/disciplina/{disciplina:slug}', ['as' => 'site.materiais.disciplina', 'uses' => 'MaterialController@materiaisPorDisciplina'],function (App\Disciplina $disciplina) {return $disciplina;});

Route::get('/site/visita/busca', ['as' => 'site.visita.busca', 'uses' => 'VisitaController@busca'], function() {});
Route::get('/site/visita/buscar',['as'=> 'site.visita.buscar.registro','uses'=> 'Auth\RegisterController@buscarUsuarioVisita'],function () {});
Route::post('/site/visita/salvar', ['as' => 'site.visita.salvar', 'uses' => 'VisitaController@salvarUsuarioVisita'], function() {});
Route::get('/site/visita/verificar/{id}/{hash}', ['as' => 'site.verificar.visita', 'uses' => 'Auth\VerificationController@verificarVisita'], function() {});

Route::get('/termos&privacidade', ['as' => 'termo.privacidade', 'uses' => 'Auth\RegisterController@visualizarTermosPrivacidade'], function() {});
Route::get('/confirmacao/email', ['as' => 'confirmacao.email', 'uses' => 'Auth\VerificationController@confirmacaoEmail'], function() {});

Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
  Route::get('/gerenciar', ['as' => 'auth.gerenciar', 'uses' => 'HomeController@gerenciar'], function () {});
});

Route::middleware(['auth','check.cpf'])->group(function () {

        
	Route::get('/auth/registros',['as'=> 'auth.registros','uses'=> 'Auth\RegisterController@index'],function () {});
  	Route::get('/auth/registros/editar',['as'=> 'auth.registros.editar','uses'=> 'Auth\RegisterController@editar'],function () {});
   	Route::any('/auth/registros/atualizar',['as'=> 'auth.registros.atualizar','uses'=> 'Auth\RegisterController@atualizar'],function () {});
	Route::get('/auth/registros/deletar/{id}',['as'=> 'auth.registros.deletar','uses'=> 'Auth\RegisterController@deletar'],function () {});
	
	Route::get('/auth/disciplinas', ['as' => 'auth.disciplinas', 'uses' => 'DisciplinaController@index'], function () {});
	Route::get('/auth/disciplina/adicionar', ['as' => 'auth.disciplina.adicionar', 'uses' => 'DisciplinaController@adicionar'],function () {});
	Route::post('/auth/disciplina/salvar', ['as' => 'auth.disciplina.salvar', 'uses' => 'DisciplinaController@salvar'],function () {});
	Route::get('/auth/disciplina/editar/{registro:slug}', ['as' => 'auth.disciplina.editar', 'uses' => 'DisciplinaController@editar'],function (App\Disciplina $registro) {return $registro;});
	Route::put('/auth/disciplina/atualizar/{id}', ['as' => 'auth.disciplina.atualizar', 'uses' => 'DisciplinaController@atualizar'],function () {});
	Route::get('/auth/disciplina/deletar/{registro:slug}', ['as' => 'auth.disciplina.deletar', 'uses' => 'DisciplinaController@deletar'],function (App\Disciplina $registro) {return $registro;});

	Route::get('/auth/postagens', ['as' => 'auth.postagens', 'uses' => 'PostagemController@index'], function () {});

	Route::get('/auth/postagem/adicionar', ['as' => 'auth.postagem.adicionar', 'uses' => 'PostagemController@adicionar'], function () {});
	Route::post('/auth/postagem/salvar', ['as' => 'auth.postagem.salvar', 'uses' => 'PostagemController@salvar'], function () {});

	Route::get('/auth/postagem/editar/{registro:slug}', ['as' => 'auth.postagem.editar', 'uses' => 'PostagemController@editar'], function (App\Postagem $registro) {return $registro;});

	Route::put('/auth/postagem/atualizar/{id}', ['as' => 'auth.postagem.atualizar', 'uses' => 'PostagemController@atualizar'], function (App\Postagem $registro) {return $registro;});

	Route::get('/auth/postagem/deletar/{registro:slug}', ['as' => 'auth.postagem.deletar', 'uses' => 'PostagemController@deletar'], function (App\Postagem $registro) {return $registro;});

	Route::get('/auth/postagem/publicar/{registro:slug}', ['as' => 'auth.postagem.publicar', 'uses' => 'PostagemController@publicar_postagem'], function (App\Postagem $registro) {return $registro;});

	Route::get('/auth/postagem/ver/{registro:slug}', ['as' => 'auth.postagem.ver', 'uses' => 'PostagemController@visualizarRascunho'], function (App\Postagem $registro) {return $registro;});
	
	Route::get('/auth/categorias', ['as' => 'auth.categorias', 'uses' => 'CategoriaController@index'], function () {});
	Route::get('/auth/categoria/adicionar', ['as' => 'auth.categoria.adicionar', 'uses' => 'CategoriaController@adicionar'], function () {});
	Route::post('/auth/categoria/salvar', ['as' => 'auth.categoria.salvar', 'uses' => 'CategoriaController@salvar'], function () {});
	Route::get('/auth/categoria/editar/{registro:slug}', ['as' => 'auth.categoria.editar', 'uses' => 'CategoriaController@editar'],  function (App\Categoria $registro) {return $registro;});
	Route::put('/auth/categoria/atualizar/{id}', ['as' => 'auth.categoria.atualizar', 'uses' => 'CategoriaController@atualizar'], function () {});
	Route::get('/auth/categoria/deletar/{registro:slug}', ['as' => 'auth.categoria.deletar', 'uses' => 'CategoriaController@deletar'],  function (App\Categoria $registro) {return $registro;});

	Route::get('/auth/atlas', ['as' => 'auth.atlas', 'uses' => 'AtlaController@index'], function () {});
	Route::get('/auth/atla/adicionar', ['as' => 'auth.atla.adicionar', 'uses' => 'AtlaController@adicionar'], function () {});
	Route::post('/auth/atla/salvar', ['as' => 'auth.atla.salvar', 'uses' => 'AtlaController@salvar'], function () {});
	Route::get('/auth/atla/editar/{registro:slug}', ['as' => 'auth.atla.editar', 'uses' => 'AtlaController@editar'], function (App\Atla $registro) {return $registro;});
	Route::put('/auth/atla/atualizar/{id}', ['as' => 'auth.atla.atualizar', 'uses' => 'AtlaController@atualizar'], function () {});
	Route::get('/auth/atla/deletar/{registro:slug}', ['as' => 'auth.atla.deletar', 'uses' => 'AtlaController@deletar'],function (App\Atla $registro) {return $registro;});
	Route::get('/auth/atla/visualizar/{registro:slug}', ['as' => 'auth.atla.visualizar', 'uses' => 'AtlaController@ver'], function (App\Atla $registro) {return $registro;});
	Route::get('/auth/atla/publicar/{registro:slug}', ['as' => 'auth.atla.publicar', 'uses' => 'AtlaController@publicar'], function (App\Atla $registro) {return $registro;});

	Route::get('/auth/materiais', ['as' => 'auth.materiais', 'uses' => 'MaterialController@index'], function () {});
	Route::get('/auth/materiais/adicionar', ['as' => 'auth.material.adicionar', 'uses' => 'MaterialController@adicionar'], function () {});
	Route::post('/auth/materiais/salvar', ['as' => 'auth.material.salvar', 'uses' => 'MaterialController@salvar'], function () {});
	Route::get('/auth/materiais/editar/{registro:slug}', ['as' => 'auth.material.editar', 'uses' => 'MaterialController@editar'], function (App\Material $registro) {return $registro;});
	Route::put('/auth/materiais/atualizar/{id}', ['as' => 'auth.material.atualizar', 'uses' => 'MaterialController@atualizar'], function () {});
	Route::get('/auth/materiais/deletar/{registro:slug}', ['as' => 'auth.material.deletar', 'uses' => 'MaterialController@deletar'], function (App\Material $registro) {return $registro;});
	Route::get('ajax/materiais/disciplina/{registro:slug}', ['as' => 'auth.ajax.materiais.disciplina', 'uses' => 'MaterialController@ajaxMateriaisDisciplina'], function (App\Atla $registro) {return $registro;});
	Route::get('/auth/material/visualizar/{registro:slug}', ['as' => 'auth.material.visualizar', 'uses' => 'MaterialController@ver'], function (App\Material $registro) {return $registro;});
	Route::get('/auth/material/publicar/{registro:slug}', ['as' => 'auth.material.publicar', 'uses' => 'MaterialController@publicar'], function (App\Material $registro) {return $registro;});


	Route::get('/auth/visitas', ['as' => 'auth.visitas', 'uses' => 'VisitaController@index'], function() {});
	Route::get('/auth/visita/ver/{registro:slug}', ['as' => 'auth.visita.ver', 'uses' => 'VisitaController@ver'], function (App\Visita $registro) {return $registro;});
	Route::put('/auth/visitas/atualizar/{id}', ['as' => 'auth.visita.atualizar', 'uses' => 'VisitaController@atualizar'], function() {});
	Route::get('/auth/visitas/deletar/{id}', ['as' => 'auth.visita.deletar', 'uses' => 'VisitaController@deletar'], function() {});

	Route::get('/auth/acesso_gerenciamento', ['as' => 'auth.acesso_gerenciamento', 'uses' => 'Auth\RegisterController@gerenciarSolicitacao'], function () {});
	Route::get('/auth/acesso_gerenciamento/aceitarSolicitacao/{id}', ['as' => 'auth.acesso_gerenciamento.aceitarSolicitacao', 'uses' => 'Auth\RegisterController@aceitarSolicitacao'], function() {});
	Route::get('/auth/acesso_gerenciamento/recusarSolicitacao/{id}', ['as' => 'auth.acesso_gerenciamento.recusarSolicitacao', 'uses' => 'Auth\RegisterController@recusarSolicitacao'], function() {});
	
	Route::get('/auth/contatos', ['as' => 'auth.contatos', 'uses' => 'ContatoController@index'], function () {});
	Route::get('/auth/contato/adicionar', ['as' => 'auth.contato.adicionar', 'uses' => 'ContatoController@adicionar'], function () {});
	Route::post('/auth/contato/salvar', ['as' => 'auth.contato.salvar', 'uses' => 'ContatoController@salvar'], function () {});
	Route::get('/auth/contato/editar/{registro:slug}', ['as' => 'auth.contato.editar', 'uses' => 'ContatoController@editar'], function (App\Contato $registro) {return $registro;});
	Route::put('/auth/contato/atualizar/{id}', ['as' => 'auth.contato.atualizar', 'uses' => 'ContatoController@atualizar'], function () {});
	Route::get('/auth/contato/deletar/{registro:slug}', ['as' => 'auth.contato.deletar', 'uses' => 'ContatoController@deletar'],function (App\Contato $registro) {return $registro;});

});

Route::post('/auth/passwords/reset', ['as' => 'auth.password.resetPassword', 'uses' => 'ContaController@resetPassword'], function () {});
Route::post('/auth/passwords/email', ['as' => 'auth.password.validatePasswordRequest', 'uses' => 'ContaController@validatePasswordRequest'], function () {});

//Route::get('/home', 'HomeController@index')->name('home');

