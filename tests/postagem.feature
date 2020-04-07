Feature: postagem
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar postagens

  Scenario: criar uma postagem valida
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de postagens
    And Eu clico em 'Adicionar'
    Then Eu deve estar na pagina de criar postagens
    When Eu preencho o campo titulo com 'Visita ao LAPA'
    And Eu preencho o campo descricao com 'Recebemos em nosso laboratorio visita dos alunos da escola publica EREMG'
    And Eu escolho a data '07.04.2020'
    And Eu clico em 'Escolher arquivo' e escolho 'teste.pdf'
    And Eu clico em 'Adicionar'
    Then Eu devo ver a postagem 'Visita ao LAPA'
    