Feature: usuario
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de logar,criar,editar,atualizar,deletar registro de usuario

  Scenario: criar registro de usuario administrador valido
	 Given Eu estou na pagina de solicitar acesso ao sistema LAPA
    	 When  Eu preencho o campo email com "irisviana12@gmail.com"
    	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu preencho o campo confirmacao de senha "Brasil2020@"
    	 And   Eu preencho o campo nome "iris"
         And   Eu preencho o campo sobrenome "viana"
    	 And   Eu preencho o campo cpf "809.098.098-00"
         And   Eu preencho o campo descricao profissional"PHD em Engenharia da computação"
    	 And   Eu clico em  solicitar acesso
         And   Eu comfirmo o email "irisviana12@gmail.com"
    	 Then  Eu vejo que a solicitacao do usuario com email "irisviana12@gmail.com" foi aceita com sucesso

  Scenario: login de usuario nao cadastrado
         Given Eu estou na pagina de login
    	 And   Eu preencho o campo email com "irisviana14@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
    	 When  Eu clico em entrar
    	 Then  Eu vejo que o usuario nao esta logado

  Scenario: criar registro de usuario administrador com email em branco
	 Given Eu estou na pagina de solicitar acesso ao sistema LAPA
    	 When  Eu preencho o campo email com ""
    	 And   Eu preencho o campo senha "Brasil2020@"
    	 And   Eu preencho o campo confirmacao de senha "Brasil2020@"
    	 And   Eu preencho o campo nome "Laura"
         And   Eu preencho o campo sobrenome "viana"
    	 And   Eu preencho o campo cpf "809.098.098-00"
         And   Eu preencho o campo descricao profissional"PHD em Engenharia da computação"
    	 And   Eu clico em  solicitar acesso
    	 Then  Eu vejo que o usuario com nome "iris viana" nao foi salvo

   Scenario: login de usuario cadastrado
         Given Eu estou na pagina de login
    	 And   Eu preencho o campo email com "irisviana12@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
    	 When  Eu clico em entrar
    	 Then  Eu vejo que o usuario esta logado
  
  Scenario: atualizar nome valido do usuario administrador cadastrado 
         Given Eu estou na pagina de login
	 And   Eu preencho o campo email com "irisviana12@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         When  Eu mudo o nome do registro para "Maria"
         And   Eu clico em Editar
         Then  Eu vejo que o nome do usuario foi atualizado para "Maria"

  Scenario: atualizar nome em branco do usuario administrador cadastrado 
         Given Eu estou na pagina de login
	 And   Eu preencho o campo email com "irisviana12@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         When  Eu mudo o nome do registro para ""
         And   Eu clico em Editar
         Then  Eu vejo que o nome do usuario nao foi atualizado com sucesso

 Scenario: remover registro do usuario logado 
         Given Eu estou na pagina de login
	 And   Eu preencho o campo email com "irisviana12@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         When  Eu clico em deletar registro
         Then  Eu vejo que o registro do usuario foi removido
