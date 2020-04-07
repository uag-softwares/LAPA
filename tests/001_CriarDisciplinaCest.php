<?php 

class CriarDisciplinaCest
{
    // tests
    public function tryToTest(AcceptanceTester $test)
    {
        $test->amGoingTo('criar uma nova disciplina chamada Engenharia de Software');
        $test->amOnPage('/auth/disciplinas');
        $test->click('Adicionar');
        $test->fillField('nome', 'Engenharia de Software');
        $test->click('Adicionar');
        $test->see('Engenharia de Software');
    }
}
