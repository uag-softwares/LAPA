Feature: usuario
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de logar,criar,editar,atualizar,deletar registro de usuario

  Scenario: criar registro de usuario administrador valido
	 Given Eu estou na pagina de solicitar acesso ao sistema LAPA
    	 When  Eu preencho o campo email com "irisviana12@gmail.com"
    	 And   Eu preencho o campo senha "12345678"
         And   Eu preencho o campo confirmacao de senha "12345678"
    	 And   Eu preencho o campo nome "iris"
         And   Eu preencho o campo sobrenome "viana"
    	 And   Eu preencho o campo cpf "809.098.098-00"
         And   Eu preencho o campo descricao profissional"PHD em Engenharia da computação"
    	 And   Eu clico em  solicitar acesso
         And   Eu comfirmo o email "irisviana12@gmail.com"
    	 Then  Eu vejo que a solicitacao do usuario com email "irisviana12@gmail.com" foi aceita com sucesso

  