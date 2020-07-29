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
class PostagemSteps extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    
	/*==================================== A partir daqui metodos para feature Postagem =======================
     */

     /**
     * @Given Eu estou na pagina de postagens
     */
    public function euEstouNaPaginaDePostagens()
    {
        $this->amOnPage('/auth/postagens');
    }

    


   /**
    * @When Eu preencho o campo titulo com :arg1
    */
    public function euPreenchoOCampoTituloCom($arg1)
    {
        $this->fillField(['name' => 'titulo'], $arg1);
    }

    /**
     * @When Eu preencho o campo descricao com :arg1
     */
    public function euPreenchoOCampoDescricaoCom($arg1)
    {
        $this->fillField(['name' => 'descricao'], $arg1);
    }


   /**
    * @When Eu clico em Escolher arquivo e escolho :arg1
    */
    public function euClicoEmEscolherArquivoEEscolho($arg1)
    {
        $this->attachFile(['name' => 'anexo'], $arg1);
    }

   

   /**
    * @When Eu edito o titulo para :arg1
    */
    public function euEditoOTituloPara($arg1)
    {
        $this->fillField(['name' => 'titulo'], $arg1);
    }

    /**
     * @When Eu edito a descricao para :arg1
     */
    public function euEditoADescricaoPara($arg1)
    {
        $this->fillField(['name' => 'descricao'], $arg1);
    }

   /**
    * @Then Eu nao vejo a postagem :arg1
    */
    public function euNaoVejoAPostagem($arg1)
    {
        $this->dontSee($arg1);
    }


    /**
     * @When Eu clico em Escolher arquivo editando o anexo para :arg1
     */
    public function euClicoEmEscolherArquivoEditandoOAnexoPara($arg1)
    {
        $this->attachFile(['name' => 'anexo'], $arg1);
    }


   /**
    * @Then Eu vejo que a postagem com titulo :arg1 nao foi adicionada
    */
    public function euVejoQueAPostagemComTituloNaoFoiAdicionada($arg1)
    {
        $this->dontSee($arg1);
    }

    /**
     * @Then Eu vejo a mensagem de erro :arg1
     */
    public function euVejoAMensagemDeErro($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Then Eu devo ver a mensagem de erro :arg1
     */
    public function euDevoVerAMensagemDeErro($arg1)
    {
        $this->see($arg1);
    }
    
    /**
     * @Then Eu abro a pagina de criar postagem
     */
     public function euAbroAPaginaDeCriarPostagem()
     {
        $this->amOnPage('/auth/postagem/adicionar');
     }


    /**
     * @Then Eu abro a pagina de editar a postagem
     */
     public function euAbroAPaginaDeEditarAPostagem()
     {
         $this->seeInCurrentUrl('/auth/postagem/editar/');
     }

    /**
     * @Then Eu vejo que a postagem com titulo :arg1 foi salva com sucesso
     */
     public function euVejoQueAPostagemComTituloFoiSalvaComSucesso($arg1)
     {
         $this->see($arg1, '//table/tbody/tr');
     }
      /**
     * @Then Eu nao vejo a postagem com titulo :arg1
     */
     public function euNaoVejoAPostagemComTitulo($arg1)
     {
         $this->see($arg1, '//table/tbody/tr');
     }
     /**
     * @Given Eu clico em Editar a postagem com titulo :arg1
     */
     public function euClicoEmEditarAPostagemComTitulo($arg1)
     {
          $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[1]');
     }
      /**
     * @Given Eu clico em Deletar a postagem com titulo :arg1
     */
     public function euClicoEmDeletarAPostagemComTitulo($arg1)
     {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[1]');
     }


}