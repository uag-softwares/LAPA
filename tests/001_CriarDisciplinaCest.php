<?php 

class CriarDisciplinaCest
{
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amGoingTo('criar uma nova disciplina chamada Engenharia de Software');
        $I->amOnPage('/admin/disciplinas');
        $I->click('Adicionar');
        $I->fillField('nome', 'Engenharia de Software');
        $I->click('Adicionar');
        $I->see('Engenharia de Software');
    }
}
