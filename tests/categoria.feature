Feature: categoria
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar categorias

  Scenario: criar uma categoria valida
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de categorias
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar categoria
    When Eu preencho o campo nome com "Sistema nervoso"
    And Eu clico em Adicionar
    Then Eu devo ver a categoria "Sistema nervoso"


    Scenario: atualizar uma categoria valida
    Given Eu estou logado
    And Eu estou na pagina de categorias
    And Eu clico em Editar a categoria "Sistema nervoso"
    Then Eu devo estar na pagina de editar a categoria
    When Eu edito o nome  da categoria para "Sistema respiratório"
    And Eu clico em Editar
    Then Eu devo ver a categoria com nome "Sistema respiratório"
    

  Scenario: deletar uma categoria com sucesso
    Given Eu estou logado
    And Eu estou na pagina de categorias
    And Eu clico em Deletar a categoria "Sistema respiratório"
    Then Eu nao vejo a categoria com nome "Sistema respiratório"
    And Eu deleto o usuario para o teste
    
