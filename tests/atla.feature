@atla
Feature: atla
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar categorias
  
  Scenario: criar um atla valido
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "Olho mamifero"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em escolher arquivo e escolho "anexo.png"
    And Eu clico em Adicionar
    Then Eu vejo que o atlas foi adicionado corretamente
  
   Scenario: criar um atla com titulo invalido
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "O"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo do título é de 5 letras"
  
  Scenario: criar um atla com descricao invalido
    Given Eu estou logado como "Raquel" com email "raquel@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "Olho de um peixe"
    And Eu preencho o campo descricao com "OOO"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo da descrição é 10 letras"

  Scenario: criar um atla sem anexo
    Given Eu estou logado como "Raquel" com email "raquel@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "Olho de um peixe"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O campo anexo é obrigatório."

  Scenario: criar um atla sem categoria
    Given Eu estou logado como "Raquel" com email "raquel@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "Olho de um peixe"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu clico em escolher arquivo e escolho "anexo.png"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "A categoria é obrigatória"

  Scenario: atualizar descricao de um atlas invalido
    Given Eu estou logado como "iris" com email "iris@admin.com" e senha "12345678"
    And O atla "Olho mamifero" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em editar o atlas "Olho mamifero"
    When Eu edito a descricao para ""
    And Eu clico em escolher arquivo e escolho "anexo.png"
    And Eu clico em editar atlas
    Then Eu vejo a mensagem de erro "A descrição do atlas é obrigatório."

  Scenario: atualizar titulo de um atlas invalido
    Given Eu estou logado como "iris" com email "iris@admin.com" e senha "12345678"
    And O atla "Olho mamifero" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em editar o atlas "Olho mamifero"
    When Eu edito o titulo para "Ol"
    And Eu clico em escolher arquivo e escolho "anexo.png"
    And Eu clico em editar atlas
    Then Eu vejo a mensagem de erro "O tamanho mínimo do título é de 5 letras."

  Scenario: atualizar um atlas existente
    Given Eu estou logado como "iris" com email "iris@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema nervoso" ja exista
    And O atla "Olho esquerdo" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em editar o atlas "Olho esquerdo"
    When Eu edito o titulo para "Olho esquerdo"
    And Eu edito a descricao para "Olho mamifero na diagonal"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em escolher arquivo e escolho "anexo.png"
    And Eu clico em editar atlas
    Then Eu vejo que o atlas foi atualizado corretamente

  Scenario: deletar um atlas com sucesso
    Given Eu estou logado como "daniel" com email "daniel@admin.com" e senha "12345678"
    And O atla "Olho esquerdo" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em deletar o atlas "Olho esquerdo"
    Then Eu vejo que o atlas foi deletado corretamente

 
