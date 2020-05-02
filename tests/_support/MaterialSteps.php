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
class MaterialSteps extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

/**
     * @Given Eu estou na pagina de adicionar materiais
     */
    public function euEstouNaPaginaDeAdicionarMateriais()
    {
        $this->amOnPage('/auth/materiais/adicionar');
    }

   /**
    * @When Eu clico em adicionar material
    */
    public function euClicoEmAdicionarMaterial()
    {
        $this->click('Adicionar');
    }

   /**
    * @Then Eu vejo que o material foi adicionado corretamente
    */
    public function euVejoQueOMaterialFoiAdicionadoCorretamente()
    {
        $this->see('Material adicionado com sucesso!');
    }


      /**
     * @Given Eu estou na pagina de gerenciar materiais
     */
    public function euEstouNaPaginaDeGerenciarMateriais()
    {
       $this->amOnPage('/auth/materiais');
    }   

   /**
    * @When Eu preencho o campo texto com :arg1
    */
    public function euPreenchoOCampoTextoCom($arg1)
    {
         $this->fillField(['name' => 'texto'], $arg1);
    }

     /**
    * @Given Eu clico em editar material com titulo :arg1
    */
    public function euClicoEmEditarMaterialComTitulo($arg1)
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
        $this->seeInCurrentUrl('/auth/materiais/editar/');
    }


   /**
    * @When Eu edito o campo titulo para :arg1
    */
    public function euEditoOCampoTituloPara($arg1)
    {
        $this->fillField(['name' => 'titulo'], $arg1);
    }


   /**
    * @Then Eu vejo erro ao adicionar material em branco
    */
    public function euVejoErroAoAdicionarMaterialEmBranco()
    {
        $this->see('Título do material é obrigatório');
    }


   /**
    * @When Eu clico em editar material
    */
    public function euClicoEmEditarMaterial()
    {
        $this->click('Editar');
    }

    /**
     * @When Eu clico em deletar material com titulo :arg1
     */
    public function euClicoEmDeletarMaterialComTitulo($arg1)
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
    }

   /**
    * @Then Eu vejo que o material foi deletado corretamente
    */
    public function euVejoQueOMaterialFoiDeletadoCorretamente()
    {
        $this->see('Material deletado com sucesso!');
    }

}