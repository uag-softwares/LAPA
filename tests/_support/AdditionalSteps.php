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
}