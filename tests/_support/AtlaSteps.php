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
class AtlaSteps extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
    * @Given Eu clico em Adicionar
    */
    public function euClicoEmAdicionar()
    {
        $this->click('Adicionar');
        
    }
     /**
     * @Given Eu estou na pagina de adicionar atlas
     */
    public function euEstouNaPaginaDeAdicionarAtlas()
    {
        $this->amOnPage('/auth/atla/adicionar');
    }

   /**
    * @Then Eu vejo que o atlas foi adicionado corretamente
    */
    public function euVejoQueOAtlasFoiAdicionadoCorretamente()
    {
        $this->see('Página do atlas adicionada com sucesso!');
    }


}