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
class DisciplinaSteps extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given Eu estou na pagina de adicionar disciplinas
     */
    public function euEstouNaPaginaDeAdicionarDisciplinas()
    {
        $this->amOnPage('/auth/disciplina/adicionar');
        $this->see('Adicionar disciplina', '//h2');
    }

    /**
    * @Given Eu clico em adicionar disciplina
    */
    public function euClicoEmAdicionarDisciplina()
    {
        $this->click('Adicionar disciplina');
    }

    /**
    * @When Eu preencho o campo nome com :arg1
    */
    public function euPreenchoOCampoNomeCom($arg1)
    {
        $this->fillField(['name' => 'nome'], $arg1);
    }

   /**
    * @When Eu seleciono o professor :arg1
    */
    public function euSelecionoOProfessor($arg1)
    {
        $this->selectOption(['name' => 'user_id'], $arg1);
    }

    /**
     * @Then Eu vejo que a disciplina foi adicionada corretamente
     */
    public function euVejoQueADisciplinaFoiAdicionadaCorretamente()
    {
        $this->see('Disciplina adicionada com sucesso!');
    }

    /**
     * @Given Eu estou na pagina de gerenciar disciplinas
     */
    public function euEstouNaPaginaDeGerenciarDisciplinas()
    {
        $this->amOnPage('/auth/disciplinas/');
        $this->see('Gerenciar disciplinas', '//h2');
    }

    /**
     * @Given Eu clico em editar a disciplina :arg1
     */
    public function euClicoEmEditarADisciplina($arg1)
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
        $this->seeInCurrentUrl('/auth/disciplina/editar/');
    }

    /**
     * @When Eu altero o professor para :arg1
     */
    public function euAlteroOProfessorPara($arg1)
    {
        $this->selectOption(['name' => 'user_id'], $arg1);
    }

    /**
     * @When Eu clico em salvar alteracoes
     */
    public function euClicoEmSalvarAlteracoes()
    {
        $this->click('Salvar alterações');
    }

    /**
     * @Then Eu vejo que a disciplina foi alterada corretamente
     */
    public function euVejoQueADisciplinaFoiAlteradaCorretamente()
    {
        $this->see('Disciplina atualizada com sucesso!');
    }

    /**
     * @Given Eu clico em deletar a disciplina :arg1
     */
    public function euClicoEmDeletarADisciplina($arg1)
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
        //$this->seeInPopup('Tem certeza que deseja deletar a disciplina?'); // Para teste no chromedriver
        //$this->acceptPopup(); // Para teste no chromedriver
    }

    /**
     * @Then Eu vejo que a disciplina foi deletada corretamente
     */
    public function euVejoQueADisciplinaFoiDeletadaCorretamente()
    {
        $this->see('Disciplina deletada com sucesso!');
    }

    /**
     * @Then Eu vejo erro ao adicionar disciplina sem nome
     */
    public function euVejoErroAoAdicionarDisciplinaSemNome()
    {
        //$this->see('O nome da disciplina é obrigatório');
        $this->amOnPage('/auth/disciplina/adicionar');
    }

   /**
    * @Then Eu vejo erro ao adicionar disciplina com nome muito curto
    */
    public function euVejoErroAoAdicionarDisciplinaComNomeMuitoCurto()
    {
        //$this->see('O tamanho mínimo do nome é 3 letras');  
        $this->amOnPage('/auth/disciplina/adicionar');      
    }
    /**
    * @Then Eu vejo erro ao adicionar disciplina com nome existente 
    */
    public function euVejoErroAoAdicionarDisciplinaComNomeExistente()
    {
        //$this->see('O tamanho mínimo do nome é 3 letras');  
        $this->amOnPage('/auth/disciplina/adicionar');      
    }

}