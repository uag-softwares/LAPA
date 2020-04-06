<?php 

class DeletarDisciplinaCest
{
    // tests
    public function tryToTest(AcceptanceTester $test)
    {
        $test->amGoingTo('deletar a disciplina Engenharia de Softare Editado');
        $test->amOnPage('/admin/disciplinas');
        $test->see('Engenharia de Software Editado', '//table/tbody/tr[1]');
        $test->click('Deletar', '//table/tbody/tr[1]');
        $test->dontSee('Engenharia de Software Editado');
    }
}
