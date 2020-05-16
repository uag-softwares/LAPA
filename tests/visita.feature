@visita
Feature: visita
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder solicitar, ver, aceitar e cancelar visitas

  Scenario: solicitar uma nova visita valida
    Given Eu estou na pagina de adicionar visitas
    When Eu preencho o campo email com "vinicius1@email.com"
    And Eu clico em iniciar solicitacao
    When Eu preencho o campo nome com "Vinicius"
    And Eu preencho o campo sobrenome com "Santos"
    And Eu preencho o campo cpf com "010.020.030-04"
    And Eu preencho o campo telefone com "(81)999999999"
    And Eu preencho o campo data com "17-05-2050"
    And Eu preencho o campo hora inicial com "12:00"
    And Eu preencho o campo hora final com "14:00"
    And Eu preencho o campo descricao com "Desejo visitar o laboratório com uma turma de 9 ano"
    And Eu clico em agendar
    Then Eu vejo que a visita foi agendada corretamente
    

  Scenario: confirmar uma visita existente
    Given Eu estou logado como "quiteria" com email "quiteria@admin.com" e senha "12345678"
    And A visita "quiteria@admin.com" ja exista
    And Eu estou na pagina de gerenciar visitas
    And Eu clico em ver a visita "quiteria@admin.com"
    When Eu clico em confirmar
    Then Eu vejo que a visita foi confirmada corretamente

  Scenario: cancelar uma visita existente
    Given Eu estou logado como "quiteria" com email "quiteria@admin.com" e senha "12345678"
    And A visita "quiteria@admin.com" ja exista
    And Eu estou na pagina de gerenciar visitas
    When Eu clico em cancelar a visita "quiteria@admin.com"
    Then Eu vejo que a visita foi cancelada corretamente
