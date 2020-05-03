Feature: postagem
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar postagens

  Scenario: criar uma postagem valida
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Adicionar
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "Visita ao LAPA"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu seleciono o professor com email "laura@admin.com"
    And Eu clico em Adicionar
    Then Eu vejo que a postagem com titulo "Visita ao LAPA" foi salva com sucesso

 Scenario: atualizar campos de titulo,descricao e anexo de uma postagem valida
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "Visita ao LAPA"
    When Eu edito o titulo para "Entrega de peças ao acervo"
    And Eu edito a descricao para "Chegaram novas peças no nosso acervo"
    And Eu clico em Escolher arquivo e escolho "arquivo.pdf"
    And Eu clico em Editar
    Then Eu vejo que a postagem com titulo "Entrega de peças ao acervo" foi salva com sucesso

 Scenario: atualizar titulo em branco de uma postagem invalida
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "Entrega de peças ao acervo"
    When Eu edito o titulo para ""
    And Eu clico em Editar
    Then Eu vejo a mensagem de erro "O título da postagem é obrigatório"

 Scenario: atualizar descricao em branco de uma postagem invalida
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "Entrega de peças ao acervo"
    When Eu edito a descricao para ""
    And Eu clico em Editar
    Then Eu vejo a mensagem de erro "A descrição da postagem é obrigatória"

Scenario: criar postagem com tamanho do titulo invalido
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Adicionar
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "aa"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "A descrição da postagem é obrigatória"

Scenario: criar postagem com tamanho da descricao invalida
    Given Eu estou logado como "Joice" com email "joice@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Adicionar
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo descricao com "qwe"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo da descrição é 10 letras"

Scenario: deletar uma postagem com sucesso
    Given Eu estou logado como "Marcia" com email "Marcia@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Deletar a postagem com titulo "Entrega de peças ao acervo"
    Then Eu nao vejo a postagem com titulo "Entrega de peças ao acervo"
   
