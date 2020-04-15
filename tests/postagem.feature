Feature: postagem
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar postagens

  Scenario: criar uma postagem valida
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de postagens
    And Eu clico em Adicionar
    Then Eu deve estar na pagina de criar postagem
    When Eu preencho o campo titulo com "Visita ao LAPA"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu devo ver a postagem "Visita ao LAPA"

  Scenario: atualizar titulo de uma postagem invalida
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem "Visita ao LAPA"
    Then Eu devo estar na pagina de editar a postagem
    When Eu edito o titulo para ""
    And Eu clico em Editar
    Then Eu vejo a mensagem de erro "O título da postagem é obrigatório"
  
  Scenario: atualizar descricao de uma postagem invalida
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem "Recebemos alunos da escola EREMG"
    Then Eu devo estar na pagina de editar a postagem
    When Eu edito a descricao para ""
    And Eu clico em Editar
    Then Eu vejo a mensagem de erro "A descrição da postagem é obrigatória"
    
    
  Scenario: atualizar campos de uma postagem valida
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem "Visita ao LAPA"
    Then Eu devo estar na pagina de editar a postagem
    When Eu edito o titulo para "Entrega de peças ao acervo"
    And Eu edito a descricao para "Chegaram novas peças no nosso acervo"
    And Eu clico em Escolher arquivo editando o anexo para "arquivo.pdf"
    And Eu clico em Editar
    Then Eu devo ver a postagem "Entrega de peças ao acervo"
    And Eu devo ver como descricao da postagem "Chegaram novas peças no nosso acervo"
  
  Scenario: deletar uma postagem com sucesso
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em Deletar a postagem "Chegaram novas peças no nosso acervo"
    Then Eu nao vejo a postagem "Chegaram novas peças no nosso acervo"

  Scenario: criar postagem com titulo invalido
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em Adicionar
    Then Eu deve estar na pagina de criar postagem
    When Eu preencho o campo titulo com "aa"
    And Eu clico em Adicionar
    Then Eu vejo que a postagem com titulo "aa" nao foi adicionada
    
  Scenario: criar postagem com descricao invalida
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em Adicionar
    Then Eu deve estar na pagina de criar postagem
    When Eu preencho o campo descricao com "qwe"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo da descrição é 10 letras"
    And Eu deleto o usuario para o teste
 

