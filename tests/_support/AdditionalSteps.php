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

class AdditionalSteps extends \Codeception\Actor
{

    use _generated\AcceptanceTesterActions;

    /**
     * @Given Eu estou logado como :arg1 com email :arg2 e senha :arg3
     */
    public function euEstouLogadoComoComEmailESenha($arg1, $arg2, $arg3)
    {        
        $this->amOnPage('/login');
        $this->fillField(['name' => 'email'], $arg2);
        $this->fillField(['name' => 'password'], $arg3);
        $this->click('Entrar');
        $this->see($arg1, '//button');
    }
}