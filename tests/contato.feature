@contato
Feature: contato
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar informações do contato

  Scenario: criar um contato valido
    Given Eu estou logado como "Jose" com email "jose@admin.com" e senha "12345678"
    And Eu estou na pagina de gerenciar contato
    When Eu preencho o campo email do contato com "lapaufape@gmail.com"
    And Eu preencho o campo texto do contato com "descricao do quem somos no contato"
    And Eu preencho o campo telefone do contato com "88 999999999"
    And Eu preencho o campo instagram do contato com "https://instagram.com/exemplo"
    And Eu preencho o campo twitter do contato com "https://twitter.com/exemplo"
    And Eu preencho o campo facebook do contato com "https://facebook.com/exemplo"    
    And Eu clico em Salvar
    Then Eu vejo que o contato foi adicionado corretamente

 Scenario: criar um contato com email invalido
    Given Eu estou logado como "Jose" com email "jose@admin.com" e senha "12345678"
    And Eu estou na pagina de gerenciar contato
    When Eu preencho o campo email do contato com "lapaufape@gmail.com"
    And Eu preencho o campo texto do contato com "descricao do quem somos no contato"
    And Eu preencho o campo telefone do contato com "88 999999999"
    And Eu preencho o campo instagram do contato com "https://instagram.com/exemplo"
    And Eu preencho o campo twitter do contato com "https://twitter.com/exemplo"
    And Eu preencho o campo facebook do contato com "https://facebook.com/exemplo"    
    And Eu clico em Salvar
    Then Eu vejo que o contato foi adicionado corretamente

 Scenario: atualizar contato existente valido
    Given Eu estou logado como "Josepf" com email "Joseph@admin.com" e senha "12345678"
    And o contato "Joseph@admin.com" ja exista
    And Eu estou na pagina de gerenciar contato
    When Eu edito o campo email do contato para "Laboratorio@gmail.com"
    And Eu edito o campo texto do contato para "teste de descricao"
    And Eu edito o campo telefone do contato para "88 888888888"
    And Eu edito o campo instagram do contato para "https://instagram.com/instagran"
    And Eu edito o campo twitter do contato para "https://twitter.com/twitter"
    And Eu edito o campo facebook do contato para "https://facebook.com/facebook"    
    And Eu clico em Salvar alterações
    Then Eu vejo que o contato foi atualizado corretamente


