<?php
class LoginCest 
{    
    public function _before(AcceptanceTester $Teste)
    {
        $Teste->amOnPage('/');
    }
    
}