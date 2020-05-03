@atla
Feature: atla
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar categorias

  Scenario: criar um atla valido
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Patologia" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "Olho mamifero"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo que o atlas foi adicionado corretamente
  
   Scenario: criar um atla com titulo invalido
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Patologia" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "O"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo do título é de 5 letras"
  
  Scenario: criar um atla com descricao invalido
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Patologia" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de adicionar atlas
    When Eu preencho o campo titulo com "Olho de um peixe"
    And Eu preencho o campo descricao com "OOO"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo da descrição é 10 letras"

 