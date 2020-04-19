<?php

namespace Tests\Feature;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
class UserTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Teste criar usuário valido
     *
     * @return void
     */
    public function testCriarUsuarioValido()
    {
        $user = factory(User::class)->create(['cpf'=>'999.999.999-99',]);
        $this->assertDatabaseHas('users', [
        'cpf' => '999.999.999-99',]);
       
    }

     /**
     * Teste deletar usuário cadastrado
     *
     * @return void
     */
    public function testDeletarUsuarioCadastrado()
    {
      $user= factory(User::class)->create(['cpf'=>'888.888.888-88',]);
      $user->delete();
      $this->assertDeleted($user);
       
    }
    /**
     * Teste atualizar nome valido de usuário cadastrado
     *
     * @return void
     */
    public function testEditarUsuarioNomeValido()
    {
      $user= factory(User::class)->create(['name'=>'Cecilia',]);
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
