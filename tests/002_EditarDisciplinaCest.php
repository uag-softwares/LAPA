<?php

use \Codeception\Util\Locator;

class EditarDisciplinaCest
{
    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amGoingTo('editar a disciplina Engenharia de Software mudando o nome para Engenharia de Software Editado');
        $I->amOnPage('/admin/disciplinas');
        $I->see('Engenharia de Software', '//table/tbody/tr[1]');
        $I->click('Editar', '//table/tbody/tr[1]');
        $I->fillField('nome', 'Engenharia de Software Editado');
        $I->click('Editar');
        $I->see('Engenharia de Software Editado');
    }
}
