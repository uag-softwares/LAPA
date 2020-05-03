@atla
Feature: atla
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar categorias
  
  Scenario: atualizar descricao de um atlas invalido
    Given Eu estou logado como "iris" com email "iris@admin.com" e senha "12345678"
    And O atla "Olho mamifero" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em editar o atlas "Olho mamifero"
    When Eu edito a descricao para ""
    And Eu clico em editar atlas
    Then Eu vejo erro ao atualizar o atlas com descricao invalida

  Scenario: atualizar um atlas existente
    Given Eu estou logado como "iris" com email "iris@admin.com" e senha "12345678"
    And O atla "Olho esquerdo" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em editar o atlas "Olho esquerdo"
    When Eu edito o titulo para "Olho esquerdo"
    And Eu edito a descricao para "Olho mamifero na diagonal"
    And Eu seleciono a categoria "Nenhum"
    And Eu clico em escolher arquivo editando o anexo para "arquivo.pdf"
    And Eu clico em editar atlas
    Then Eu vejo que o atlas foi atualizado corretamente

  Scenario: deletar um atlas com sucesso
    Given Eu estou logado como "iris" com email "iris@admin.com" e senha "12345678"
    And O atla "Olho esquerdo" ja exista
    And Eu estou na pagina de gerenciar atlas
    And Eu clico em deletar o atlas "Olho esquerdo"
    Then Eu vejo que o atlas foi deletado corretamente
