Feature: postagem
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar postagens

  Scenario: criar uma postagem valida
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em 'Adicionar'
    Then Eu deve estar na pagina de criar postagem
    When Eu preencho o campo titulo com 'Visita ao LAPA'
    And Eu preencho o campo descricao com 'Recebemos alunos da escola EREMG'
    And Eu preencho o campo data com 'a data de hoje'
    And Eu clico em 'Escolher arquivo' e escolho 'teste.pdf'
    And Eu clico em 'Adicionar'
    Then Eu devo ver a postagem 'Visita ao LAPA'
    
  Scenario: atualizar titulo de uma postagem valida
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em 'Editar' a postagem 'Visita ao LAPA'
    Then Eu devo estar na pagina de edicao da postagem 'Visita ao LAPA'
    When Eu edito o titulo para 'Entrega de peças ao acervo'
    And Eu edito a descricao para 'Chegaram novas peças no nosso acervo'
    And Eu edito o campo data com 'a data de amanha'
    And Eu clico em 'Escolher arquivo' editando o anexo para 'arquivo.pdf'
    And Eu clico em 'Editar'
    Then Eu devo ver a postagem 'Entrega de peças ao acervo'
    And Eu devo ver como descricao da postagem 'Chegaram novas peças no nosso acervo' 
    And Eu devo ver que a data mudou para 'a data de amanha'
    And Eu devo ver que o anexo mudou para 'arquivo.pdf'
  
  
  Scenario: deletar uma postagem com sucesso
    Given Eu estou logado
    And Eu estou na pagina de postagens
    And Eu clico em 'Deletar' a postagem 'Entrega de peças ao acervo'
    Then Eu nao vejo a disciplina 'Entrega de peças ao acervo'
    And Eu deleto o usuario para o teste