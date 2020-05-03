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
class CategoriaSteps extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
     * @Given Eu estou na pagina de adicionar categorias
     */
    public function euEstouNaPaginaDeAdicionarCategorias()
    {
        $this->amOnPage('/auth/categoria/adicionar');
        
    }

    /**
    * @Given Eu clico em Adicionar
    */
    public function euClicoEmAdicionar()
    {
       
        $this->click('Adicionar');
    }

    /**
    * @When Eu preencho o campo nome da categoria com :arg1
    */
    public function euPreenchoOCampoNomeDaCategoriaCom($arg1)
    {
        $this->fillField(['name' => 'nome'], $arg1);
    }

    /**
     * @When Eu seleciono a disciplina :arg1
     */
    public function euSelecionoADisciplina($arg1)
    {
        $this->selectOption(['name' => 'disciplina_id'], $arg1);
    }

    /**
     * @Then Eu vejo que a categoria foi adicionada corretamente
     */
    public function euVejoQueACategoriaFoiAdicionadaCorretamente()
    {
        $this->see('Categoria adicionada com sucesso!');
    }

    /**
     * @Given Eu estou na pagina de gerenciar categorias
     */
    public function euEstouNaPaginaDeGerenciarCategorias()
    {
        $this->amOnPage('/auth/categorias/');
        $this->see('Gerenciar categorias', '//h2');
    }

     /**
     * @Given Eu clico em Editar a categoria :arg1
     */
    public function euClicoEmEditarACategoria($arg1)
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
    }

   /**
     * @Then Eu vejo que a categoria foi alterada corretamente
     */
    public function euVejoQueACategoriaFoiAlteradaCorretamente()
    {
        $this->see('Categoria atualizada com sucesso!');
    }

    /**
     * @Given Eu clico em Deletar a categoria :arg1
     */
    public function euClicoEmDeletarACategoria($arg1)
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
        
    }
     /**
     * @Then Eu vejo que a categoria foi deletada corretamente
     */
    public function euVejoQueACategoriaFoiDeletadaCorretamente()
    {
        $this->see('Categoria deletada com sucesso!');
    }

     /**
     * @When Eu edito o nome para :arg1
     */
    public function euEditoONomePara($arg1)
    {
        $this->fillField(['name' => 'nome'], $arg1);
    }

   /**
    * @When Eu clico em Editar
    */
    public function euClicoEmEditar()
    {
        $this->click('Editar');
    }


}