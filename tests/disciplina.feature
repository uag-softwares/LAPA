Feature: disciplina
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar disciplinas

  Scenario: criar uma disciplina valida
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de disciplinas
    And Eu clico em 'Adicionar'
    Then Eu deve estar na pagina de criar disciplina
    When Eu preencho o campo nome com 'ES'
    And Eu seleciono o professor 'Rodrigo'
    And Eu clico em 'Adicionar'
    Then Eu devo ver a disciplina 'ES'

  Scenario: atualizar uma disciplina valida
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em 'Editar' a disciplina 'ES'
    Then Eu devo estar na pagina de edicao da disciplina 'ES'
    When Eu edito o nome para 'IHC'
    And Eu clico em 'Editar'
    Then Eu devo ver a disciplina 'IHC'

  Scenario: deletar uma disciplina com sucesso
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em 'Deletar' a disciplina 'IHC'
    Then Eu nao vejo a disciplina 'IHC'
    And Eu deleto o usuario para o teste