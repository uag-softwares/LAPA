@categoria
Feature: categoria
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar categorias
  
  Scenario: criar uma categoria valida
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And Eu estou na pagina de adicionar categorias
    When Eu preencho o campo nome da categoria com "Sistema nervoso"
    And Eu seleciono a disciplina "Ihc"
    And Eu clico em Adicionar
    Then Eu vejo que a categoria foi adicionada corretamente

 
  Scenario: atualizar uma categoria valida
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema nervoso" ja exista
    And Eu estou na pagina de gerenciar categorias
    And Eu clico em Editar a categoria "Sistema nervoso"
    When Eu edito o nome para "Sistema linfatico"
    And Eu clico em Editar
    Then Eu vejo que a categoria foi alterada corretamente

 
  Scenario: deletar uma categoria existente com sucesso
    Given Eu estou logado como "Rodrigo" com email "admin@admin.com" e senha "12345678"
    And A disciplina "Ihc" ja exista
    And A categoria "Sistema linfatico" ja exista
    And Eu estou na pagina de gerenciar categorias
    And Eu clico em Deletar a categoria "Sistema linfatico"
    Then Eu vejo que a categoria foi deletada corretamente
    

