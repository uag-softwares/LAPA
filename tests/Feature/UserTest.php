<?php

namespace Tests\Feature;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Conta;
class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Teste criar usuário administrador valido
     *
     * @return void
     */
    public function testCriarUsuarioValido()
    {
        $user = factory(User::class)->create(['cpf'=>'999.999.999-99',]);
        $conta = factory(Conta::class)->create(['user_id'=>$user->id,]);
        $this->assertDatabaseHas('users', [
        'cpf' => '999.999.999-99',]);
        $this->assertDatabaseHas('contas', [
       'user_id' => $user->id,]);
       
    }

     /**
     * Teste deletar usuário administrador cadastrado
     *
     * @return void
     */
    public function testDeletarUsuarioCadastrado()
    {
      $user= factory(User::class)->create(['cpf'=>'888.888.888-88',]);
      $conta = factory(Conta::class)->create(['user_id'=>$user->id,]);
      $user->delete();
      $this->assertDeleted($user);
       
    }
    /**
     * Teste atualizar nome valido de usuário administrador cadastrado
     *
     * @return void
     */
    public function testEditarUsuarioNomeValido()
    {
      $user= factory(User::class)->create(['name'=>'Cecilia',]);
      $conta = factory(Conta::class)->create(['user_id'=>$user->id,]);
      $this->assertDatabaseHas('users', [
        'name' => 'Cecilia',]);
      $user->update(['name'=>'Taylor',]);
      $this->assertEquals('Taylor',$user->name);
       
    }
     /**
     * Teste ler usuario nao cadastrado
     *
     * @return void
     */
    public function testLerUsuarioNaoCadastrado()
    {
      $this->assertDatabaseMissing('users', [
        'cpf' => '000.000.000-00',]);
     
       
    }

}
