<?php

use \Codeception\Util\Locator;

class EditarDisciplinaCest
{
    // tests
    public function tryToTest(AcceptanceTester $test)
    {
        $test->amGoingTo('editar a disciplina Engenharia de Software mudando o nome para Engenharia de Software Editado');
        $test->amOnPage('/auth/disciplinas');
        $test->see('Engenharia de Software', '//table/tbody/tr[1]');
        $test->click('Editar', '//table/tbody/tr[1]');
        $test->fillField('nome', 'Engenharia de Software Editado');
        $test->click('Editar');
        $test->see('Engenharia de Software Editado');
    }
}
