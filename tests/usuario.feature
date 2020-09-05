Feature: usuario
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de logar,criar,editar,atualizar,deletar registro de usuario

  Scenario: login de usuario nao cadastrado
         Given Eu estou na pagina de login
    	 And   Eu preencho o campo email com "naousuario@gmail.com"
	 And   Eu preencho o campo senha "naoUsuario2020@"
    	 When  Eu clico em entrar
    	 Then  Eu vejo que o usuario nao esta logado

  Scenario: criar registro de usuario administrador com email em branco
	 Given Eu estou na pagina de solicitar acesso ao sistema LAPA
    	 When  Eu preencho o campo email com ""
    	 And   Eu preencho o campo senha "Brasil2020@"
    	 And   Eu preencho o campo confirmacao de senha "Brasil2020@"
    	 And   Eu preencho o campo nome "Laura"
    	 And   Eu preencho o campo cpf "809.098.098-00"
         And   Eu preencho o campo descricao profissional"PHD em Engenharia da computação"
    	 And   Eu clico em  solicitar acesso
    	 Then  Eu vejo que o usuario com nome "iris viana" nao foi salvo

   Scenario: login de usuario cadastrado
         Given O usuario administrador com nome "iris",email "vianasantana@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
    	 And   Eu preencho o campo email com "vianasantana@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
    	 When  Eu clico em entrar
    	 Then  Eu vejo que o usuario esta logado
  
  Scenario: atualizar nome valido do usuario administrador cadastrado 
         Given O usuario administrador com nome "Rita",email "rita@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "rita@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         When  Eu mudo o nome do registro para "Maria"
         And   Eu clico em Editar
         Then  Eu vejo que o nome do usuario foi atualizado para "Maria"

  Scenario: atualizar nome em branco do usuario administrador cadastrado 
         Given O usuario administrador com nome "Maria",email "maria@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "maria@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         When  Eu mudo o nome do registro para ""
         And   Eu clico em Editar
         Then  Eu vejo que o nome do usuario nao foi atualizado com sucesso

  Scenario: remover registro do usuario logado 
         Given O usuario administrador com nome "Luiza",email "luiza@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "luiza@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         When  Eu clico em deletar registro
         Then  Eu vejo que o registro do usuario foi removido


  Scenario: atualizar link lattes valido do usuario administrador cadastrado 
         Given O usuario administrador com nome "Roberta",email "roberta@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "roberta@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         When  Eu mudo o link lattes do registro para "http://lattes.cnpq.br/3151296501932443"
         And   Eu clico em Editar
         Then  Eu vejo uma menssagem de sucesso

  Scenario: atualizar foto de perfil valido do usuario administrador cadastrado 
         Given O usuario administrador com nome "Roberta",email "roberta@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "roberta@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         And Eu seleciono o campo escolher origem do avatar link do drive
         And Eu preencho o campo do link do arquivo com "https://drive.google.com/file/d/1eJt5xYMq3chZL92_vbHSDq5VmMO22V80/view?usp=sharing"
         And   Eu clico em Editar
         Then  Eu vejo uma menssagem de sucesso

  Scenario: atualizar foto de perfil com formato invalido do usuario administrador cadastrado 
         Given O usuario administrador com nome "Roberta",email "roberta@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "roberta@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         And Eu seleciono o campo escolher origem do avatar link do drive
         And Eu preencho o campo do link do arquivo com "gsdtjhdtghjedytjhtyjk"
         And   Eu clico em Editar
         Then  Eu vejo a mensagem de erro "O formato da URL informada para o campo anexo drive é inválido."

  Scenario: atualizar link lattes com formato invalido do usuario administrador cadastrado 
         Given O usuario administrador com nome "Rodrigo",email "rodrigo@gmail.com" e senha "Brasil2020@" existe
         And   Eu estou na pagina de login
	 And   Eu preencho o campo email com "rodrigo@gmail.com"
	 And   Eu preencho o campo senha "Brasil2020@"
         And   Eu clico em entrar
         And   Eu abro pagina de configuracao de usuario
         And   Eu clico em editar registro do usuario
         Then  Eu estou na pagina de editar registro
         When  Eu mudo o link lattes do registro para "hhshjhjlattes.cnpq.br/315129650"
         And   Eu clico em Editar
         Then  Eu vejo a mensagem de erro "O formato da URL informada para o campo link lattes é inválido."



