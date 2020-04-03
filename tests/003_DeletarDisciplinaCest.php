<?php 

class DeletarDisciplinaCest
{
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amGoingTo('deletar a disciplina Engenharia de Softare Editado');
        $I->amOnPage('/admin/disciplinas');
        $I->see('Engenharia de Software Editado', '//table/tbody/tr[1]');
        $I->click('Deletar', '//table/tbody/tr[1]');
        $I->acceptPopup();
        $I->dontSee('Engenharia de Software Editado');
    }
}
