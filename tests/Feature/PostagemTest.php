<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Postagem;
use App\User;
use App\Conta;
class PostagemTest extends TestCase
{
     use RefreshDatabase;
    /**
     * Teste criar postagem valida
     *
     * @return void
     */

    public function testCriarPostagemValida()
    {
        $user = factory(User::class)->create(['cpf'=>'999.999.999-99',]);
        $conta = factory(Conta::class)->create(['user_id'=>$user->id,]);
        $postagem = factory(Postagem::class)->create(['titulo'=>'Postagem teste','user_id'=>$user->id,]);
        $this->assertDatabaseHas('postagems', [
        'titulo' => 'Postagem teste',]);
       
    }
    /**
     * Teste deletar postagem cadastrada
     *
     * @return void
     */
    public function testDeletarPostagemCadastrada()
    {
      $user = factory(User::class)->create(['cpf'=>'999.999.999-99',]);
      $conta = factory(Conta::class)->create(['user_id'=>$user->id,]);
      $postagem = factory(Postagem::class)->create(['titulo'=>'Postagem teste para deletar','user_id'=>$user->id,]);
      $postagem->delete();
      $this->assertDeleted($postagem);
       
    }
    /**
     * Teste atualizar descrição da postagem cadastrada
     *
     * @return void
     */
    public function testEditarPostagemDescricaoValida()
    {
      $user = factory(User::class)->create(['cpf'=>'999.999.999-99',]);
      $conta = factory(Conta::class)->create(['user_id'=>$user->id,]);
      $postagem= factory(Postagem::class)->create(['descricao'=>'Essa postagem está sendo criando para teste','user_id'=>$user->id,]);
      $this->assertDatabaseHas('postagems', [
        'descricao' => 'Essa postagem está sendo criando para teste',]);
      $postagem->update(['descricao'=>'Essa postagem está sendo atualizada para teste',]);
      $this->assertEquals('Essa postagem está sendo atualizada para teste',$postagem->descricao);
       
    }
    /**
     * Teste ler postagem nao cadastrada
     *
     * @return void
     */
    public function testLerPostagemNaoCadastrada()
    {
      $this->assertDatabaseMissing('postagems', [
        'descricao' => 'ler postagem não cadastrado',]);
     
       
    }
}
