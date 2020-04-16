Feature: usuario
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de logar,criar,editar,atualizar,deletar registro de usuario

  Scenario: criar registro de usuario valido
	 Given Eu estou na pagina de registro de usuario
    	 When  Eu preencho o campo email com  "irisviana12@gmail.com"
    	 And   Eu preencho o campo senha "12345678"
    	 And   Eu preencho o campo confirmacao de senha "12345678"
    	 And   Eu preencho o campo nome "iris viana"
    	 And   Eu preencho o campo cpf "809.098.098-00"
    	 And   Eu clico em  criar registro de usuario
    	 Then  Eu vejo que o registro foi criado com sucesso

  Scenario: remover registro do usuario logado 
         Given Eu crio um usuario para o teste
         And   Eu abro pagina de configuracao de usuario
         When  Eu clico em deletar registro
         Then   Eu vejo que o registro do usuario foi removido

  Scenario: login de usuaio nao cadastrado
         Given Eu estou na pagina de login
    	 And   Eu preencho o campo email com  "irisviana12@gmail.com"
	 And   Eu preencho o campo senha "12345678"
    	 When  Eu clico em login
    	 Then  Eu vejo que o usuario nao esta logado

  Scenario: criar registro de usuario com email em branco
	 Given Eu estou na pagina de registro de usuario
    	 When  Eu preencho o campo email com  ""
    	 And   Eu preencho o campo senha "12345678"
    	 And   Eu preencho o campo confirmacao de senha "12345678"
    	 And   Eu preencho o campo nome "iris viana"
    	 And   Eu preencho o campo cpf "809.098.098-00"
    	 And   Eu clico em  criar registro de usuario
    	 Then  Eu vejo que o usuario com nome "iris viana" nao foi salvo

  
