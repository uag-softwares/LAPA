Feature: disciplina
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar disciplinas

  Scenario: criar uma disciplina valida
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de disciplinas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar disciplina
    When Eu preencho o campo nome com "Engenharia de Software"
    And Eu seleciono o professor "Rodrigo"
    And Eu clico em Adicionar
    Then Eu devo ver a disciplina "Engenharia de Software"

  Scenario: atualizar uma disciplina valida
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Editar a disciplina "Engenharia de Software"
    Then Eu devo estar na pagina de editar a disciplina
    When Eu edito o nome para "IHC"
    And Eu edito o professor para "Nenhum"
    And Eu clico em Editar
    Then Eu devo ver a disciplina "IHC"
    And Eu devo ver o professor "Nenhum professor"

  Scenario: deletar uma disciplina com sucesso
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Deletar a disciplina "IHC"
    Then Eu nao vejo a disciplina "IHC"

  Scenario: criar uma disciplina com sem nome
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar disciplina
    When Eu preencho o campo nome com ""
    And Eu seleciono o professor "Rodrigo"
    And Eu clico em Adicionar
    Then Eu devo ver que a disciplina sem nome não foi adicionada

  Scenario: criar uma disciplina com nome invalido
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar disciplina
    When Eu preencho o campo nome com "ES"
    And Eu seleciono o professor "Rodrigo"
    And Eu clico em Adicionar
    Then Eu devo ver que a disciplina com nome invalido não foi adicionada

  Scenario: criar uma disciplina valida sem professor
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar disciplina
    When Eu preencho o campo nome com "Engenharia de Software"
    And Eu clico em Adicionar
    Then Eu devo ver a disciplina "Engenharia de Software" sem professor
    And Eu deleto o usuario para o teste