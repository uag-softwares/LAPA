@material
Feature: material
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de criar,editar,atualizar,deletar materiais

  Scenario: criar material valido
    Given Eu estou logado como "raquel" com email "raquel@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com "Material de Ihc"
    And   Eu preencho o campo texto com "Esse material e referente a disciplina ES"
    And   Eu clico em Escolher arquivo e escolho "teste.pdf"
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em adicionar material
    Then  Eu vejo que o material foi adicionado corretamente

  Scenario: atualizar material com titulo em branco
    Given Eu estou logado como "raquel" com email "raquel@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   O material "Material de Ihc" ja exista
    And   Eu estou na pagina de gerenciar materiais
    And   Eu clico em editar material com titulo "Material de Ihc"
    When  Eu edito o campo titulo para " "
    And   Eu clico em editar material
    Then  Eu vejo erro ao adicionar material em branco

 Scenario: deletar material valido
    Given Eu estou logado como "raquel" com email "raquel@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   O material "Material de Ihc" ja exista
    And   Eu estou na pagina de gerenciar materiais
    When  Eu clico em deletar material com titulo "Material de Ihc"
    Then  Eu vejo que o material foi deletado corretamente