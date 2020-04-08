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
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given Eu crio um usuario para o teste
     */
    public function euCrioUmUsuarioParaOTeste()
    {
        $this->amOnPage('/register');
        $this->fillField(['name' => 'name'], 'Rodrigo');
        $this->fillField(['name' => 'cpf'], '11111111111');
        $this->fillField(['name' => 'email'], 'admin@admin.com');
        $this->fillField(['name' => 'password'], '12345678');
        $this->fillField(['name' => 'password_confirmation'], '12345678');
        $this->selectOption(['name' => 'isAdmin'], 'Sim');
        $this->click('Cadastrar');
    }

    /**
     * @Given Eu estou logado
     */
    public function euEstouLogado()
    {
        $this->amOnPage('/login');
        $this->fillField(['name' => 'email'], 'admin@admin.com');
        $this->fillField(['name' => 'password'], '12345678');
        $this->click('Login');
    }

    /**
     * @Given Eu estou na pagina de disciplinas
     */
    public function euEstouNaPaginaDeDisciplinas()
    {
        $this->amOnPage('/auth/disciplinas');
    }

   /**
    * @Given Eu clico em 'Adicionar'
    */
    public function euClicoEmAdicionar()
    {
        $this->click('Adicionar');
    }

   /**
    * @Then Eu deve estar na pagina de criar disciplina
    */
    public function euDeveEstarNaPaginaDeCriarDisciplina()
    {
        $this->amOnPage('/auth/disciplina/adicionar');
    }

   /**
    * @When Eu preencho o campo nome com 'ES'
    */
    public function euPreenchoOCampoNomeComES()
    {
        $this->fillField(['name' => 'nome'], 'ES');
    }

   /**
    * @When Eu seleciono o professor 'Rodrigo'
    */
    public function euSelecionoOProfessorRodrigo()
    {
        $this->selectOption(['name' => 'user_id'], 'Rodrigo');
    }

   /**
    * @Then Eu devo ver a disciplina 'ES'
    */
    public function euDevoVerADisciplinaES()
    {
        $this->see('ES');
    }

    /**
     * @Given Eu clico em 'Editar' a disciplina 'ES'
     */
    public function euClicoEmEditarADisciplinaES()
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="ES"]/ancestor::tr/td[3]');
    }

   /**
    * @Then Eu devo estar na pagina de edicao da disciplina 'ES'
    */
    public function euDevoEstarNaPaginaDeEdicaoDaDisciplinaES()
    {
        $this->seeInCurrentUrl('/auth/disciplina/editar/');
    }

   /**
    * @When Eu edito o nome para 'IHC'
    */
    public function euEditoONomeParaIHC()
    {
        $this->fillField(['name' => 'nome'], 'IHC');
    }

   /**
    * @When Eu clico em 'Editar'
    */
    public function euClicoEmEditar()
    {
        $this->click('Editar');
    }

   /**
    * @Then Eu devo ver a disciplina 'IHC'
    */
    public function euDevoVerADisciplinaIHC()
    {
        $this->see('IHC');
    }

    /**
     * @Given Eu clico em 'Deletar' a disciplina 'IHC'
     */
    public function euClicoEmDeletarADisciplinaIHC()
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="IHC"]/ancestor::tr/td[3]');
        //$this->acceptPopup();
    }

   /**
    * @Then Eu nao vejo a disciplina 'IHC'
    */
    public function euNaoVejoADisciplinaIHC()
    {
        $this->dontSee('IHC');
    }

    /**
     * @Then Eu deleto o usuario para o teste
     */
    public function euDeletoOUsuarioParaOTeste()
    {
        $this->amOnPage('/auth/registros');
        $this->seeInCurrentUrl('/auth/registros');
        $this->click('Deletar', '//table/tr/td[text()="Rodrigo"]/ancestor::tr/td[5]');
        $this->dontSee('Rodrigo');
    }
}
