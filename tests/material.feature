Feature: material
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de criar,editar,atualizar,deletar materiais

  Scenario: criar uma disciplina valida para teste de material
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de disciplinas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar disciplina
    When Eu preencho o campo nome com "Ihc"
    And Eu clico em Adicionar
    Then Eu devo ver a disciplina "Ihc" sem professor

  Scenario: criar material valido
    Given Eu estou logado
    And   Eu abro a pagina de materiais
    And   Eu clico em Adicionar
    Then  Eu devo estar na pagina de criar material
    When  Eu preencho o campo titulo com "Material de Ihc"
    And   Eu preencho o campo texto com "Esse material e referente a disciplina ES"
    And   Eu clico em Escolher arquivo e escolho "teste.pdf"
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em Adicionar
    Then  Eu devo ver o material com titulo "Material de Ihc" criado com sucesso

  Scenario: atualizar material com titulo em branco
    Given Eu estou logado
    And   Eu abro a pagina de materiais
    And   Eu clico em Editar material com titulo "Material de Ihc"
    Then  Eu devo estar na pagina de editar material 
    When  Eu edito o campo titulo para " "
    And   Eu clico em Editar
    Then  Eu devo ver uma menssagem de erro "Título do material é obrigatório"

 Scenario: deletar material valido
    Given Eu estou logado
    And   Eu abro a pagina de materiais
    When  Eu clico em Deletar material com titulo "Material de Ihc"
    Then  Eu devo ver que o material com titulo "Material de Ihc" foi removido

  Scenario: deletar uma disciplina de teste com sucesso
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Deletar a disciplina "Ihc"
    Then Eu nao vejo a disciplina "Ihc"
    And Eu deleto o usuario para o teste