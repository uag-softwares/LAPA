@disciplina
Feature: disciplina
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar disciplinas

  Scenario: criar uma nova disciplina valida
    Given Eu estou logado como "Vinicius" com email "vinicius@admin.com" e senha "12345678"
    And Eu estou na pagina de adicionar disciplinas
    When Eu preencho o campo nome com "Engenharia de software"
    And Eu seleciono o professor "Vinicius"
    And Eu clico em adicionar disciplina
    Then Eu vejo que a disciplina foi adicionada corretamente

  Scenario: atualizar o professor de uma disciplina existente
    Given Eu estou logado como "Vinicius" com email "vinicius@admin.com" e senha "12345678"
    And Eu estou na pagina de gerenciar disciplinas
    And Eu clico em editar a disciplina "Engenharia de software"
    When Eu altero o professor para "Nenhum"
    And Eu clico em salvar alteracoes
    Then Eu vejo que a disciplina foi alterada corretamente

  Scenario: deletar uma disciplina existente com sucesso
    Given Eu estou logado como "Vinicius" com email "vinicius@admin.com" e senha "12345678"
    And Eu estou na pagina de gerenciar disciplinas
    And Eu clico em deletar a disciplina "Engenharia de software"
    Then Eu vejo que a disciplina foi deletada corretamente

  Scenario: criar uma nova disciplina sem nome
    Given Eu estou logado como "Vinicius" com email "vinicius@admin.com" e senha "12345678"
    And Eu estou na pagina de adicionar disciplinas
    When Eu preencho o campo nome com ""
    And Eu seleciono o professor "Vinicius"
    And Eu clico em adicionar disciplina
    Then Eu vejo erro ao adicionar disciplina sem nome

  Scenario: criar uma disciplina valida sem professor
    Given Eu estou logado como "Vinicius" com email "vinicius@admin.com" e senha "12345678"
    And Eu estou na pagina de adicionar disciplinas
    When Eu preencho o campo nome com "Engenharia de software"
    And Eu clico em adicionar disciplina
    Then Eu vejo que a disciplina foi adicionada corretamente
    And Eu clico em deletar a disciplina "Engenharia de software"
    
  Scenario: criar uma nova disciplina com nome muito curto
    Given Eu estou logado como "Daniela" com email "daniela@admin.com" e senha "12345678"
    And Eu estou na pagina de adicionar disciplinas
    When Eu preencho o campo nome com "ES"
    And Eu seleciono o professor "Daniela"
    And Eu clico em adicionar disciplina
    Then Eu vejo erro ao adicionar disciplina com nome muito curto

  Scenario: criar uma nova disciplina com nome ja existente
    Given Eu estou logado como "Daniela" com email "daniela@admin.com" e senha "12345678"
    And A disciplina "Estrutura de dados" ja exista
    And Eu estou na pagina de adicionar disciplinas
    When Eu preencho o campo nome com "Estrutura de dados"
    And Eu seleciono o professor "Daniela"
    And Eu clico em adicionar disciplina
    Then Eu vejo erro ao adicionar disciplina com nome existente 
