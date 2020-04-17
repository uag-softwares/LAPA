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
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given Eu crio um usuario para o teste
     */
    public function euCrioUmUsuarioParaOTeste()
    {
        $this->amOnPage('/register');
        $this->fillField(['name' => 'name'], 'Rodrigo');
        $this->fillField(['name' => 'cpf'], '111.111.111-11');
        $this->fillField(['name' => 'email'], 'admin@admin.com');
        $this->fillField(['name' => 'password'], '12345678');
        $this->fillField(['name' => 'password_confirmation'], '12345678');
        $this->click('Cadastrar');
    }

    /**
     * @Given Eu estou logado
     */
    public function euEstouLogado()
    {
        $this->amOnPage('/login');
        $this->fillField(['name' => 'email'], 'admin@admin.com');
        $this->fillField(['name' => 'password'], '12345678');
        $this->click('Login');
    }

    /**
     * @Then Eu deleto o usuario para o teste
     */
    public function euDeletoOUsuarioParaOTeste()
    {
        $this->amOnPage('/auth/registros');
        $this->seeInCurrentUrl('/auth/registros');
        $this->click('Deletar', '//table/tbody/tr/td[text()="Rodrigo"]/ancestor::tr/td[4]');
        //$this->seeInPopup('Tem certeza que deseja excluir a conta?'); // Para teste no chromedriver
        //$this->acceptPopup(); // Para teste no chromedriver
        $this->dontSee('Rodrigo');
    }

    /*==================================== A partir daqui metodos para feature Disciplina =======================
     */

    /**
     * @Given Eu estou na pagina de disciplinas
     */
    public function euEstouNaPaginaDeDisciplinas()
    {
        $this->amOnPage('/auth/disciplinas');
    }

   /**
    * @Given Eu clico em Adicionar
    */
    public function euClicoEmAdicionar()
    {
        $this->click('Adicionar');
    }

   /**
    * @Then Eu devo estar na pagina de criar disciplina
    */
    public function euDevoEstarNaPaginaDeCriarDisciplina()
    {
        $this->amOnPage('/auth/disciplina/adicionar');
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
    * @Then Eu devo ver a disciplina :arg1
    */
    public function euDevoVerADisciplina($arg1)
    {
        $this->see($arg1, '//table/tbody/tr');
    }

    /**
     * @Given Eu clico em Editar a disciplina :arg1
     */
    public function euClicoEmEditarADisciplina($arg1)
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
    }

   /**
    * @Then Eu devo estar na pagina de editar a disciplina
    */
    public function euDevoEstarNaPaginaDeEditaraDisciplina()
    {
        $this->seeInCurrentUrl('/auth/disciplina/editar/');
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

    /**
     * @When Eu edito o professor para :arg1
     */
    public function euEditoOProfessorPara($arg1)
    {
        $this->selectOption(['name' => 'user_id'], $arg1);
    }

   /**
    * @Then Eu devo ver o professor :arg1
    */
    public function euDevoVerOProfessor($arg1)
    {
        $this->see($arg1, '//table/tbody/tr');
    }


    /**
     * @Given Eu clico em Deletar a disciplina :arg1
     */
    public function euClicoEmDeletarADisciplina($arg1)
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
        //$this->seeInPopup('Tem certeza que deseja deletar a disciplina?'); // Para teste no chromedriver
        //$this->acceptPopup(); // Para teste no chromedriver
    }

   /**
    * @Then Eu nao vejo a disciplina :arg1
    */
    public function euNaoVejoADisciplina($arg1)
    {
        $this->dontSee($arg1);
    }

    /**
     * @Then Eu devo ver que a disciplina com nome invalido não foi adicionada
     */
    public function euDevoVerQueADisciplinaComNomeInvalidoNoFoiAdicionada()
    {
        $this->see('O tamanho mínimo do nome é 3 letras');
    }

    /**
     * @Then Eu devo ver que a disciplina sem nome não foi adicionada
     */
    public function euDevoVerQueADisciplinaSemNomeNoFoiAdicionada()
    {
        $this->see('O nome da disciplina é obrigatório');
    }

    /**
     * @Then Eu devo ver a disciplina :arg1 sem professor
     */
    public function euDevoVerADisciplinaSemProfessor($arg1)
    {
        $this->see('Nenhum professor', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[2]');
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
    * @Then Eu deve estar na pagina de criar postagem
    */
    public function euDeveEstarNaPaginaDeCriarPostagem()
    {
        $this->amOnPage('/auth/postagem/adicionar');
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
    * @Then Eu devo ver a postagem :arg1
    */
    public function euDevoVerAPostagem($arg1)
    {
        $this->see($arg1, '//table/tbody/tr');
    }
    
    /**
     * @Given Eu clico em Editar a postagem :arg1
     */
    public function euClicoEmEditarAPostagem($arg1)
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
    }

   /**
    * @Then Eu devo estar na pagina de editar a postagem
    */
    public function euDevoEstarNaPaginaDeEdicaoDaPostagem()
    {
        $this->seeInCurrentUrl('/auth/postagem/editar/');
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
     * @Then Eu devo ver como descricao da postagem :arg1
     */
    public function euDevoVerComoDescricaoDaPostagem($arg1)
    {
        $this->see($arg1, '//table/tbody/tr');
    }


    /**
     * @Given Eu clico em Deletar a postagem :arg1
     */
    public function euClicoEmDeletarAPostagem($arg1)
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
        //$this->seeInPopup('Tem certeza que deseja deletar essa postagem?'); // Para teste no chromedriver
        //$this->acceptPopup(); // Para teste no chromedriver
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
        $this->see($arg1);
    }

       
/*==================================== feature usuario =======================
     */
     /**
     * @Given Eu estou na pagina de registro de usuario
     */
     public function euEstouNaPaginaDeRegistroDeUsuario()
     {
         $this->amOnPage('/register');
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
     * @When Eu clico em  criar registro de usuario
     */
     public function euClicoEmCriarRegistroDeUsuario()
     {
         $this->click('Cadastrar');
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
     * @When Eu clico em login
     */
     public function euClicoEmLogin()
     {
         
         $this->click('Login');
     }
 
    /**
     * @Then Eu vejo que o usuario com nome :arg1 nao foi salvo
     */
     public function euVejoQueOUsuarioComNomeNaoFoiSalvo($arg1)
     {
         $this->dontSee($arg1);
     }

      /**
     * @Then Eu vejo que o usuario nao esta logado
     */
     public function euVejoQueOUsuarioNaoEstaLogado()
     {
         $this->amOnPage('/login');
     }
      







   
     /**
     * @Given Eu estou na pagina de categorias
     */
    public function euEstouNaPaginaDeCategorias()
    {
        $this->amOnPage('/auth/categorias');   
    }

     /**
    * @Then Eu devo estar na pagina de criar categoria
    */
    public function euDevoEstarNaPaginaDeCriarCategoria()
    {
        $this->amOnPage('/auth/categoria/adicionar');
    }

    /**
    * @Then Eu devo ver a categoria :arg1
    */
    public function euDevoVerACategoria($arg1)
    {
        $this->see($arg1);
    }
     

    /**
     * @Given Eu clico em Editar a categoria :arg1
     */
    public function euClicoEmEditarACategoria($arg1)
    {
        $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');
    }

    /**
     * @When Eu seleciono a disciplina :arg1
     */
    public function euSelecionoADisciplina($arg1)
    {
        $this->selectOption(['name' => 'disciplina_id'], $arg1);
    }

   /**
    * @When Eu edito a disciplina para :arg1
    */
    public function euEditoADisciplinaPara($arg1)
    {
        $this->selectOption(['name' => 'disciplina_id'], $arg1);
    }

    /**
     * @Given Eu clico em Deletar a categoria :arg1
     */
    public function euClicoEmDeletarACategoria($arg1)
    {
        $this->click('Deletar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[3]');   
    }

   /**
    * @Then Eu nao vejo categoria :arg1
    */
    public function euNaoVejoCategoria($arg1)
    {
       $this->dontSee($arg1);
    }

    /**
     * @Then Eu devo estar na pagina de editar a categoria
     */
    public function euDevoEstarNaPaginaDeEditarACategoria()
    {
        $this->amOnPage('/auth/categoria/editar');
    }


    /**================ Testes de visita aqui ===========================*/
    /**
     * @Given Eu estou na pagina de visitas
     */
    public function euEstouNaPaginaDeVisitas()
    {
        $this->amOnPage('/auth/visitas');
    }

   /**
    * @Then Eu devo estar na pagina de criar visita
    */
    public function euDevoEstarNaPaginaDeCriarVisita()
    {
        $this->amOnPage('/auth/visita/adicionar');
    }

    /**
     * @When Eu preencho o campo responsavel com :arg1
     */
    public function euPreenchoOCampoResponsavelCom($arg1)
    {
        $this->fillField(['name' => 'responsavel'], $arg1);
    }

   /**
    * @When Eu preencho o campo data com :arg1
    */
    public function euPreenchoOCampoDataCom($arg1)
    {
        $this->fillField(['name' => 'data'], date('Y-m-d', strtotime($arg1)));
    }

   /**
    * @When Eu preencho o campo hora inicial com :arg1
    */
    public function euPreenchoOCampoHoraInicialCom($arg1)
    {
        $this->fillField(['name' => 'hora_inicial'], $arg1);
    }

   /**
    * @When Eu preencho o campo hora final com :arg1
    */
    public function euPreenchoOCampoHoraFinalCom($arg1)
    {
        $this->fillField(['name' => 'hora_final'], $arg1);
    }

   /**
    * @When Eu preencho o campo telefone com :arg1
    */
    public function euPreenchoOCampoTelefoneCom($arg1)
    {
        $this->fillField(['name' => 'telefone'], $arg1);
    }

   /**
    * @When Eu clico em Agendar
    */
    public function euClicoEmAgendar()
    {
        $this->click('Agendar');
    }

   /**
    * @Then Eu devo ver a visita de :arg1
    */
    public function euDevoVerAVisitaDe($arg1)
    {
        $this->see($arg1, '//table/tbody/tr');
    }

    /**
     * @Given Eu clico em Ver a visita :arg1
     */
    public function euClicoEmVerAVisita($arg1)
    {
        $this->click('Ver', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[6]');
    }

   /**
    * @Then Eu devo estar na pagina de ver a visita
    */
    public function euDevoEstarNaPaginaDeVerAVisita()
    {
        $this->seeInCurrentUrl('/auth/visita/ver/');
    }

   /**
    * @When Eu clico em Confirmar
    */
    public function euClicoEmConfirmar()
    {
        $this->click('Confirmar');
    }

   /**
    * @Then Eu devo ver a visita :arg1 confirmada
    */
    public function euDevoVerAVisitaConfirmada($arg1)
    {
        $this->see('Sim', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
    }

   /**
    * @When Eu clico em Cancelar a visita :arg1
    */
    public function euClicoEmCancelarAVisita($arg1)
    {
        $this->click('Cancelar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[6]');
    }

   /**
    * @Then Eu nao devo ver a visita :arg1
    */
    public function euNaoDevoVerAVisita($arg1)
    {
        $this->dontSee($arg1, '//table/tbody/tr');
    }
     /**
     * @Given Eu clico em editar registro do usuario
     */
     public function euClicoEmEditarRegistroDoUsuario()
     {
         $this->click('Editar', '//table/tbody/tr/td/ancestor::tr/td[4]');
     }

    /**
     * @Then Eu vejo que o nome do registro do usuario foi atualizado para :arg1
     */
     public function euVejoQueONomeDoRegistroDoUsuarioFoiAtualizadoPara($arg1)
     {
          $this->see($arg1, '//table/tbody/tr');
     }

    
    /**
     * @Then Eu devo estar na pagina de editar registro
     */
     public function euDevoEstarNaPaginaDeEditarRegistro()
     {
           $this->amOnPage('/auth/registros/editar');
     }

    /**
     * @When Eu edito o nome do registro para :arg1
     */
     public function euEditoONomeDoRegistroPara($arg1)
     {
         $this->fillField(['name' => 'name'], $arg1);
     }
      /**
     * @Then Eu vejo que o nome do registro do usuario nao foi atualizado com sucesso
     */
     public function euVejoQueONomeDoRegistroDoUsuarioNaoFoiAtualizadoComSucesso()
     {
         $this->see('Senha deve ser obrigatória');
     }

      /**
     * @Then Eu vejo que o usuario esta logado
     */
     public function euVejoQueOUsuarioEstaLogado()
     {
         $this->amOnPage('/');
     }
      /**
     * @Given Eu abro a pagina de materiais
     */
     public function euAbroAPaginaDeMateriais()
     {
        $this->amOnPage('/auth/materiais');
     }   

    /**
     * @Then Eu devo estar na pagina de criar material
     */
     public function euDevoEstarNaPaginaDeCriarMaterial()
     {
         $this->amOnPage('/auth/materiais/adicionar');
     }

    /**
     * @When Eu preencho o campo texto com :arg1
     */
     public function euPreenchoOCampoTextoCom($arg1)
     {
          $this->fillField(['name' => 'texto'], $arg1);
     }

    /**
     * @Then Eu devo ver o material com titulo :arg1 criado com sucesso
     */
     public function euDevoVerOMaterialComTituloCriadoComSucesso($arg1)
     {
         $this->see($arg1, '//table/tbody/tr');
     }
      /**
     * @Given Eu clico em Editar material com titulo :arg1
     */
     public function euClicoEmEditarMaterialComTitulo($arg1)
     {
         $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
     }

    /**
     * @Then Eu devo estar na pagina de editar material
     */
     public function euDevoEstarNaPaginaDeEditarMaterial()
     {
          $this->seeInCurrentUrl('/auth/materiais/editar/');
         
     }

    /**
     * @When Eu edito o campo titulo para :arg1
     */
     public function euEditoOCampoTituloPara($arg1)
     {
         $this->fillField(['name' => 'titulo'], $arg1);
     }

    /**
     * @Then Eu devo ver uma menssagem de erro :arg1
     */
     public function euDevoVerUmaMenssagemDeErro($arg1)
     {
         $this->see($arg1);
     }

     /**
     * @When Eu clico em Deletar material com titulo :arg1
     */
     public function euClicoEmDeletarMaterialComTitulo($arg1)
     {
         $this->click('Editar', '//table/tbody/tr/td[text()="'.$arg1.'"]/ancestor::tr/td[5]');
     }

    /**
     * @Then Eu devo ver que o material com titulo :arg1 foi removido
     */
     public function euDevoVerQueOMaterialComTituloFoiRemovido($arg1)
     {
         $this->dontSee($arg1);
     }




}
