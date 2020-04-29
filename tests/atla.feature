Feature: atla
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar categorias

  Scenario: criar uma disciplina valida para teste de categoria
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de disciplinas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar disciplina
    When Eu preencho o campo nome com "Ihc"
    And Eu seleciono o professor "Rodrigo"
    And Eu clico em Adicionar
    Then Eu devo ver a disciplina "Ihc"

  Scenario: criar uma categoria valida para o teste de atla
    Given Eu estou logado
    And Eu estou na pagina de categorias
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar categoria
    When Eu preencho o campo nome com "Sistema nervoso"
    And Eu seleciono a disciplina "Ihc"
    And Eu clico em Adicionar
    Then Eu devo ver a categoria "Sistema nervoso"
  
  Scenario: criar um atla valido
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar atla
    When Eu preencho o campo titulo com "Olho mamifero"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu devo ver o atlas "Olho mamifero"

  Scenario: criar um atla com titulo invalido
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar atla
    When Eu preencho o campo titulo com "O"
    And Eu preencho o campo descricao com "foto do olho do mamifero"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo do título é de 5 letras"
  
  Scenario: criar um atla com descricao invalido
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Adicionar
    Then Eu devo estar na pagina de criar atla
    When Eu preencho o campo titulo com "Olho de um peixe"
    And Eu preencho o campo descricao com "OOO"
    And Eu seleciono a categoria "Sistema nervoso"
    And Eu clico em Escolher arquivo e escolho "teste.pdf"
    And Eu clico em Adicionar
    Then Eu vejo a mensagem de erro "O tamanho mínimo da descrição é 10 letras"
    
  Scenario: atualizar titulo de um atlas invalido
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Editar o atlas "Olho mamifero"
    When Eu edito o titulo para ""
    And Eu clico em Editar
    Then Eu vejo a mensagem de erro "O título do atlas é obrigatório"
  
  Scenario: atualizar descricao de um atlas invalido
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Editar o atlas "Olho mamifero"
    When Eu edito a descricao para ""
    And Eu clico em Editar
    Then Eu vejo a mensagem de erro "A descrição do atlas é obrigatório"

  Scenario: atualizar um atlas existente
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Editar o atlas "Olho mamifero"
    And Eu edito o campo titulo para "Olho esquerdo"
    And Eu edito a descricao para "Olho mamifero na diagonal"
    And Eu seleciono a categoria "Nenhum"
    And Eu clico em Escolher arquivo editando o anexo para "arquivo.pdf"
    And Eu clico em Editar
    Then Eu devo ver o atlas "Olho esquerdo"

  Scenario: deletar um atlas com sucesso
    Given Eu estou logado
    And Eu estou na pagina de atlas
    And Eu clico em Deletar o atlas "Olho esquerdo"
    Then Eu nao vejo o atlas "Olho esquerdo"

  Scenario: deletar uma disciplina de teste com sucesso
    Given Eu estou logado
    And Eu estou na pagina de disciplinas
    And Eu clico em Deletar a disciplina "Ihc"
    Then Eu nao vejo a disciplina "Ihc"
    And Eu deleto o usuario para o teste