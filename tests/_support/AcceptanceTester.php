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
 * @SuppressWarnings(PHPMD)
*/

class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * @When Eu clico em Editar
    */
    public function euClicoEmEditar()
    {
        $this->click('Editar');
    }
    /**
     * @When Eu preencho o campo email com :arg1
     */
     public function euPreenchoOCampoEmailCom($arg1)
     {
	$this->fillField(['name' => 'email'], $arg1);
         
     }

    /**
     * @When Eu preencho o campo senha :arg1
     */
     public function euPreenchoOCampoSenha($arg1)
     {
	$this->fillField(['name' => 'password'], $arg1);
         
     }
    /**
     * @When Eu preencho o campo confirmacao de senha :arg1
     */
     public function euPreenchoOCampoConfirmacaoDeSenha($arg1)
     {
          $this->fillField(['name' => 'password_confirmation'], $arg1);
     }

    /**
     * @When Eu preencho o campo nome :arg1
     */
     public function euPreenchoOCampoNome($arg1)
     {
         $this->fillField(['name' => 'name'], $arg1);
     }

    /**
     * @When Eu preencho o campo cpf :arg1
     */
     public function euPreenchoOCampoCpf($arg1)
     {
         $this->fillField(['name' => 'cpf'], $arg1);
     }

       /**
     * @Then Eu vejo que o registro foi criado com sucesso
     */
     public function euVejoQueORegistroFoiCriadoComSucesso()
     {
         $this->amOnPage('/');
     }

     /**
     * @Given Eu abro pagina de configuracao de usuario
     */
     public function euAbroPaginaDeConfiguracaoDeUsuario()
     {
          $this->amOnPage('/auth/registros');
     }

    /**
     * @When Eu clico em deletar registro
     */
     public function euClicoEmDeletarRegistro()
     {
         $this->click('Deletar', '//table/tbody/tr[1]');
     }

    /**
     * @Then Eu vejo que o registro do usuario foi removido
     */
     public function euVejoQueORegistroDoUsuarioFoiRemovido()
     {
         $this->amOnPage('/register');

     }
     /**
     * @Given Eu estou na pagina de login
     */
     public function euEstouNaPaginaDeLogin()
     {
          $this->amOnPage('/login');
     }
      /**
     * @When Eu clico em entrar
     */
     public function euClicoEmEntrar()
     {
          $this->click('Entrar');
     }
 
    /**
     * @Then Eu vejo que o usuario com nome :arg1 nao foi salvo
     */
     public function euVejoQueOUsuarioComNomeNaoFoiSalvo($arg1)
     {
         $this->dontSee($arg1);
     }
       /**
     * @Then Eu estou na pagina de editar registro
     */
     public function euEstouNaPaginaDeEditarRegistro()
     {
          $this->amOnPage('/auth/registros/editar');
     }

    /**
     * @When Eu mudo o nome do registro para :arg1
     */
     public function euMudoONomeDoRegistroPara($arg1)
     {
          $this->fillField(['name' => 'name'], $arg1);
     }

      /**
     * @Then Eu vejo que o usuario nao esta logado
     */
     public function euVejoQueOUsuarioNaoEstaLogado()
     {
         $this->amOnPage('/login');
     }
      
/**
     * @Given Eu clico em editar registro do usuario
     */
     public function euClicoEmEditarRegistroDoUsuario()
     {
         $this->click('Editar', '//table/tbody/tr/td/ancestor::tr/td[5]');
     }
  /**
     * @Then Eu vejo que o nome do usuario foi atualizado para :arg1
     */
     public function euVejoQueONomeDoUsuarioFoiAtualizadoPara($arg1)
     {
         $this->see($arg1, '//table/tbody/tr');
     }

    /**
     * @Then Eu vejo que o nome do usuario nao foi atualizado com sucesso
     */
     public function euVejoQueONomeDoUsuarioNaoFoiAtualizadoComSucesso()
     {
         $this->see('O campo nome é obrigatório.');
     }

      /**
     * @Then Eu vejo que o usuario esta logado
     */
     public function euVejoQueOUsuarioEstaLogado()
     {
          $this->seeInCurrentUrl('/gerenciar');
     }
     /**
     * @Given Eu estou na pagina de solicitar acesso ao sistema LAPA
     */
     public function euEstouNaPaginaDeSolicitarAcessoAoSistemaLAPA()
     {
         $this->amOnPage('/register');
     }

    /**
     * @When Eu preencho o campo sobrenome :arg1
     */
     public function euPreenchoOCampoSobrenome($arg1)
     {
         $this->fillField(['name' => 'surname'], $arg1);
     }

      /**
     * @When Eu preencho o campo descricao profissional:arg1
     */
     public function euPreenchoOCampoDescricaoProfissional($arg1)
     {
         $this->fillField(['name' => 'user_description'], $arg1);
     }

    /**
     * @When Eu clico em  solicitar acesso
     */
     public function euClicoEmSolicitarAcesso()
     {
      
       $this->click('Solicitar');
      
     }

    /**
     * @When Eu comfirmo o email :arg1
     */
     public function euComfirmoOEmail($arg1)
     {  
       $this->seeInCurrentUrl('/email/verify');
       $this->updateInDatabase('users',array('email_verified_at' => now())); 
   
     }
     /**
     * @Then Eu vejo que a solicitacao do usuario com email :arg1 foi aceita com sucesso
     */
     public function euVejoQueASolicitacaoDoUsuarioComEmailFoiAceitaComSucesso($arg1)
     {
        $this->amOnPage('/');
        $this->updateInDatabase('users',array('cpf_verified_at' => now())); 
     }
        

	/*==================================== A partir daqui metodos para feature Postagem =======================
     */

     /**
     * @Given Eu estou na pagina de postagens
     */
    public function euEstouNaPaginaDePostagens()
    {
        $this->amOnPage('/auth/postagens');
    }

    


   /**
    * @When Eu preencho o campo titulo com :arg1
    */
    public function euPreenchoOCampoTituloCom($arg1)
    {
        $this->fillField(['name' => 'titulo'], $arg1);
    }

    /**
     * @When Eu preencho o campo descricao com :arg1
     */
    public function euPreenchoOCampoDescricaoCom($arg1)
    {
        $this->fillField(['name' => 'descricao'], $arg1);
    }


   /**
    * @When Eu clico em Escolher arquivo e escolho :arg1
    */
    public function euClicoEmEscolherArquivoEEscolho($arg1)
    {
        $this->attachFile(['name' => 'anexo'], $arg1);
    }

   

   /**
    * @When Eu edito o titulo para :arg1
    */
    public function euEditoOTituloPara($arg1)
    {
        $this->fillField(['name' => 'titulo'], $arg1);
    }

    /**
     * @When Eu edito a descricao para :arg1
     */
    public function euEditoADescricaoPara($arg1)
    {
        $this->fillField(['name' => 'descricao'], $arg1);
    }

   /**
    * @Then Eu nao vejo a postagem :arg1
    */
    public function euNaoVejoAPostagem($arg1)
    {
        $this->dontSee($arg1);
    }


    /**
     * @When Eu clico em Escolher arquivo editando o anexo para :arg1
     */
    public function euClicoEmEscolherArquivoEditandoOAnexoPara($arg1)
    {
        $this->attachFile(['name' => 'anexo'], $arg1);
    }


   /**
    * @Then Eu vejo que a postagem com titulo :arg1 nao foi adicionada
    */
    public function euVejoQueAPostagemComTituloNaoFoiAdicionada($arg1)
    {
        $this->dontSee($arg1);
    }

    /**
     * @Then Eu vejo a mensagem de erro :arg1
     */
    public function euVejoAMensagemDeErro($arg1)
    {
        $this->see($arg1);
    }

    /**
     * @Then Eu devo ver a mensagem de erro :arg1
     */
    public function euDevoVerAMensagemDeErro($arg1)
    {
	$this->seeInCurrentUrl('/auth/postagem/adicionar');
        $this->see($arg1);
    }
    
    /**
     * @Then Eu abro a pagina de criar postagem
     */
     public function euAbroAPaginaDeCriarPostagem()
     {
        $this->amOnPage('/auth/postagem/adicionar');
        $this->click('Adicionar');
     }


    /**
     * @Then Eu abro a pagina de editar a postagem
     */
     public function euAbroAPaginaDeEditarAPostagem()
     {
         $this->seeInCurrentUrl('/auth/postagem/editar/');
     }

    /**
     * @Then Eu vejo que a postagem com titulo :arg1 foi salva com sucesso
     */
     public function euVejoQueAPostagemComTituloFoiSalvaComSucesso($arg1)
     {
         $this->see($arg1, '//table/tbody/tr');
     }
      /**
     * @Then Eu nao vejo a postagem com titulo :arg1
     */
     public function euNaoVejoAPostagemComTitulo($arg1)
     {
         $this->dontSee($arg1, '//table/tbody/tr');
     }
     /**
     * @Given Eu clico em Editar a postagem com titulo :arg1
     */
     public function euClicoEmEditarAPostagemComTitulo($arg1)
     {
          $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
     }
      /**
     * @Given Eu clico em Deletar a postagem com titulo :arg1
     */
     public function euClicoEmDeletarAPostagemComTitulo($arg1)
     {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
     }
      
      /**
    * @Given Eu clico em Adicionar
    */
    public function euClicoEmAdicionar()
    {
        $this->click('Adicionar');
        
    }
     /**
     * @When Eu seleciono o campo tipo da postagem :arg1
     */
     public function euSelecionoOCampoTipoDaPostagem($arg1)
     {
         $this->selectOption(['name' => 'tipo_postagem'],$arg1);
     }




}
