Feature: visita
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar visitas

  Scenario: criar uma nova visita
    Given Eu crio um usuario para o teste
    And Eu estou na pagina de visitas
    And Eu clico em Agendar
    Then Eu devo estar na pagina de criar visita
    When Eu preencho o campo responsavel com "Vinicius Santos"
    And Eu preencho o campo data com "17-05-2021"
    And Eu preencho o campo hora inicial com "12:00"
    And Eu preencho o campo hora final com "14:00"
    And Eu preencho o campo descricao com "Desejo visitar o laboratório com uma turma de 9 ano"
    And Eu preencho o campo telefone com "(81)999999999"
    And Eu preencho o campo email com "vinicius@gmail.com"
    And Eu clico em Agendar
    Then Eu devo ver a visita de "Vinicius Santos"
    

  Scenario: confirmar uma visita existente
    Given Eu estou logado
    And Eu estou na pagina de visitas
    And Eu clico em Ver a visita "Vinicius Santos"
    Then Eu devo estar na pagina de ver a visita
    When Eu clico em Confirmar
    Then Eu devo ver a visita "Vinicius Santos" confirmada

  Scenario: cancelar uma visita existente
    Given Eu estou logado
    And Eu estou na pagina de visitas
    When Eu clico em Cancelar a visita "Vinicius Santos"
    Then Eu nao devo ver a visita "Vinicius Santos"
    And Eu deleto o usuario para o teste
