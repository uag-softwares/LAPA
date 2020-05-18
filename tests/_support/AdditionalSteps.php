<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/

use Illuminate\Support\Facades\Hash;

class AdditionalSteps extends \Codeception\Actor
{

    use _generated\AcceptanceTesterActions;

    /**
     * @Given Eu estou logado como :arg1 com email :arg2 e senha :arg3
     */
    public function euEstouLogadoComoComEmailESenha($arg1, $arg2, $arg3)
    {
        $this->haveInDatabase('users', [
            'name' => $arg1,
            'surname' => "Santos",
            'cpf' =>  "123.456.789-10",
            'cpf_verified_at' => now(),
            'email' => $arg2,
            'email_verified_at' => now(),
            'telephone' => "(81)98181-8181",
            'user_type' => 'admin',
        ]);

        $user = $this->grabFromDatabase('users', 'id', array('email' => $arg2));

        $this->haveInDatabase('contas', [
            'password' => '$2y$10$ND9yznr7gDYnYyaEbMtzNuwAWs6oAvX8K/SIguz8teFBSTAbPeyG6',
            'user_id' => $user,
        ]);

        $this->amOnPage('/login');
        $this->fillField(['name' => 'email'], $arg2);
        $this->fillField(['name' => 'password'], $arg3);
        $this->click('Entrar');
        $this->see($arg1, '//button');
    }

    /**
     * @Given Eu crio a disciplina :arg1 para teste
     */
    public function euCrioADisciplinaParaTeste($arg1)
    {
        $disciplina=$this->haveInDatabase('disciplinas', [
            'nome' => $arg1,
            'slug'=> $arg1,
        ]);
       
    }

    /**
     * @Given A disciplina :arg1 ja exista
     */
    public function aDisciplinaJaExista($arg1)
    {
        $this->haveInDatabase('disciplinas', [
            'nome' => $arg1,
            'slug'=> $arg1,
        ]);
    }

   /**
    * @Given O material :arg1 ja exista
    */
    public function oMaterialJaExista($arg1)
    {
        $disciplina = $this->grabFromDatabase('disciplinas', 'id', array('nome' => 'Ihc'));

        $this->haveInDatabase('materials', [
            'titulo' => $arg1,
            'texto' => 'Texto do material',
            'anexo' => 'file.png',
            'disciplina_id' => $disciplina,
            'slug'=> $arg1,
            ]);
    }
    
    /**
    * @Given A categoria :arg1 ja exista
    */
    public function aCategoriaJaExista($arg1)
    {
        $disciplina = $this->grabFromDatabase('disciplinas', 'id', array('nome' => 'Ihc'));

        $this->haveInDatabase('categorias', [
            'nome' =>$arg1,
            'disciplina_id' => $disciplina,
            'slug'=>$arg1,
        ]);
    }

    /**
     * @Given O atla :arg1 ja exista
     */
    public function oAtlaJaExista($arg1)
    {
        $this->haveInDatabase('disciplinas', [
            'nome' => 'teste',
            'slug'=> 'teste',
        ]);

        $disciplina = $this->grabFromDatabase('disciplinas', 'id', array('nome' => 'teste'));

        $this->haveInDatabase('categorias', [
            'nome' => 'Sistema nervoso',
            'disciplina_id' => $disciplina,
            'slug'=> 'Sistema nervoso',
        ]);

        $categoria = $this->grabFromDatabase('categorias', 'id', array('nome' => 'Sistema nervoso'));

        $this->haveInDatabase('atlas', [
            'titulo' => $arg1,
            'descricao' => 'Texto do atlas',
            'anexo' => 'anexo.pdf',
            'categoria_id' => $categoria,
            'slug'=> $arg1,
        ]);
    }
}