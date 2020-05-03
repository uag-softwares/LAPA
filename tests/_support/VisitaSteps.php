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
class VisitaSteps extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given Eu estou na pagina de adicionar visitas
     */
    public function euEstouNaPaginaDeAdicionarVisitas()
    {
        $this->amOnPage('/site/visita/adicionar');
    }

   /**
    * @When Eu clico em iniciar solicitacao
    */
    public function euClicoEmIniciarSolicitar()
    {
        $this->click('Iniciar solicitação');
    }

    /**
    * @When Eu preencho o campo nome com :arg1
    */
    public function euPreenchoOCampoNomeCom($arg1)
    {
        $this->fillField(['name' => 'name'], $arg1);
    }

   /**
    * @When Eu preencho o campo sobrenome com :arg1
    */
    public function euPreenchoOCampoSobrenomeCom($arg1)
    {
        $this->fillField(['name' => 'surname'], $arg1);
    }

       /**
    * @When Eu preencho o campo data com :arg1
    */
    public function euPreenchoOCampoDataCom($arg1)
    {
        $this->fillField(['name' => 'data'], date('Y-m-d', strtotime($arg1)));
    }

   /**
    * @When Eu preencho o campo hora inicial com :arg1
    */
    public function euPreenchoOCampoHoraInicialCom($arg1)
    {
        $this->fillField(['name' => 'hora_inicial'], $arg1);
    }

   /**
    * @When Eu preencho o campo hora final com :arg1
    */
    public function euPreenchoOCampoHoraFinalCom($arg1)
    {
        $this->fillField(['name' => 'hora_final'], $arg1);
    }

   /**
    * @When Eu preencho o campo cpf com :arg1
    */
    public function euPreenchoOCampoCpfCom($arg1)
    {
        $this->fillField(['name' => 'cpf'], $arg1);
    }

    /**
    * @When Eu preencho o campo telefone com :arg1
    */
    public function euPreenchoOCampoTelefoneCom($arg1)
    {
        $this->fillField(['name' => 'telephone'], $arg1);
    }

   /**
    * @Then Eu vejo que a visita foi agendada corretamente
    */
    public function euVejoQueAVisitaFoiAgendadaCorretamente()
    {
        $this->see('Visita solicitada com sucesso, você receberá um email quando ela for confirmada.'); 
    }

    /**
     * @When Eu clico em agendar
     */
    public function euClicoEmAgendar()
    {
        $this->click('Agendar');
    }

    /**
     * @Given Eu estou na pagina de gerenciar visitas
     */
    public function euEstouNaPaginaDeGerenciarVisitas()
    {
        $this->amOnPage('/auth/visitas');
    }

    /**
     * @Given Eu clico em ver a visita :arg1
     */
    public function euClicoEmVerAVisita($arg1)
    {
        $this->click('Ver', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[6]');
        $this->seeInCurrentUrl('/auth/visita/ver/');
    }

   /**
    * @When Eu clico em confirmar
    */
    public function euClicoEmConfirmar()
    {
        $this->click('Confirmar visita');
    }

   /**
     * @Then Eu vejo que a visita foi confirmada corretamente
     */
    public function euVejoQueAsVisitaFoiConfirmadaCorretamente()
    {
        $this->seeInCurrentUrl('/auth/visitas');
        $this->see('Vinicius', '//table/tbody/tr');
    }

    /**
     * @When Eu clico em cancelar a visita :arg1
     */
    public function euClicoEmCancelarAVisita($arg1)
    {
        $this->click('Cancelar');
    }

    /**
     * @Then Eu vejo que a visita foi cancelada corretamente
     */
    public function euVejoQueAVisitaFoiCanceladaCorretamente()
    {
        $this->seeInCurrentUrl('/auth/visitas');
        $this->dontSee('Vinicius', '//table/tbody/tr');
    }

}