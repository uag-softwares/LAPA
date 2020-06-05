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
         And   Eu preencho o campo sobrenome "viana"
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

  Scenario: criar registro de usuario invalido administrador com sobrenome em branco
	 Given Eu estou na pagina de solicitar acesso ao sistema LAPA
    	 When  Eu preencho o campo email com "irisviana@gmail.com"
    	 And   Eu preencho o campo senha "Brasil2020@"
    	 And   Eu preencho o campo confirmacao de senha "Brasil2020@"
    	 And   Eu preencho o campo nome "Laura"
         And   Eu preencho o campo sobrenome ""
    	 And   Eu preencho o campo cpf "809.098.098-00"
         And   Eu preencho o campo descricao profissional"PHD em Engenharia da computação"
    	 And   Eu clico em  solicitar acesso
    	 Then  Eu vejo a mensagem de erro "O campo sobrenome é obrigatório."

  Scenario: aceitar solicitacao de acesso ao sistema
	 Given A solicitao de acesso ao sistema do usuario "Laiz" e email "laiz@gmail.com" existe
         And   Eu estou logado como "Izadora" com email "Izadora@admin.com" e senha "12345678"
    	 Then  Eu abro a pagina de gerenciar solicitacao
         When  Eu clico em aceitar solicitacao do usuario com email "laiz@gmail.com"
    	 Then  Eu vejo que a solicitacao foi aceita com sucesso 

  Scenario: recusar solicitacao de acesso ao sistema
	 Given A solicitao de acesso ao sistema do usuario "Rner" e email "rner@gmail.com" existe
         And   Eu estou logado como "Izabela" com email "Izabela@admin.com" e senha "12345678"
    	 Then  Eu abro a pagina de gerenciar solicitacao
         When  Eu clico em recusar solicitacao do usuario com email "rner@gmail.com"
    	 Then  Eu vejo que a solicitacao foi recusada com sucesso 
  
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
         When  Eu mudo a foto de perfil do registro para "anexo2.png"
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
         When  Eu mudo a foto de perfil do registro para "arquivo.pdf"
         And   Eu clico em Editar
         Then  Eu vejo a mensagem de erro "O campo foto deve conter um arquivo do tipo: jpeg, jpg, png, gif."

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



