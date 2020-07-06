Feature: postagem
  In order to gerenciar o sistema do LAPA
  As a user
  I need to poder criar, ver, atualizar e deletar postagens

  Scenario: criar uma postagem valida
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "Visita ao LAPA"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "noticia"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo que a postagem com titulo "Visita ao LAPA" foi salva com sucesso

 Scenario: atualizar campos de titulo,descricao e anexo de uma postagem valida
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "Visita ao LAPA"
    When Eu edito o titulo para "Entrega de peças ao acervo"
    And Eu edito a descricao para "Chegaram novas peças no nosso acervo"
    And Eu clico em Escolher arquivo e escolho "anexo2.png"
    And Eu clico em Publicar agora
    Then Eu vejo que a postagem com titulo "Entrega de peças ao acervo" foi salva com sucesso

 Scenario: atualizar titulo em branco invalido de uma postagem cadastrada
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "Entrega de peças ao acervo"
    When Eu edito o titulo para ""
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "O campo titulo é obrigatório."

 Scenario: atualizar descricao em branco invalida de uma postagem cadastrada
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "Entrega de peças ao acervo"
    When Eu edito a descricao para ""
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "O campo descricao é obrigatório."

Scenario: criar postagem com tamanho do titulo invalido
    Given Eu estou logado como "Laura" com email "laura@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "aa"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "noticia"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "O campo titulo deve conter no mínimo 5 caracteres."

Scenario: criar postagem com tamanho da descricao invalida
    Given Eu estou logado como "Joice" com email "joice@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "Visita ao LAPA"
    And Eu preencho o campo descricao com "hwh"
    And Eu seleciono o campo tipo da postagem "noticia"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "O campo descricao deve conter no mínimo 10 caracteres."

Scenario: deletar uma postagem com sucesso
    Given Eu estou logado como "Marcia" com email "Marcia@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Deletar a postagem com titulo "Entrega de peças ao acervo"
    Then Eu nao vejo a postagem com titulo "Entrega de peças ao acervo"

Scenario: criar uma postagem valida noticia default sem selecionar o tipo
    Given Eu estou logado como "Luz" com email "luz@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "visita a ufape"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo que a postagem com titulo "visita a ufape" foi salva com sucesso

Scenario: criar uma postagem valida do tipo evento
    Given Eu estou logado como "Luz" com email "luz@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "evento 2050"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "evento"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu preencho o campo data com "2050-06-26"
    And Eu preencho o campo hora com "14:00"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo que a postagem com titulo "evento 2050" foi salva com sucesso

Scenario: criar uma postagem  do tipo evento com formato de hora invalida
    Given Eu estou logado como "Luz" com email "luz@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "evento 2050"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "evento"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu preencho o campo data com "2050-06-26"
    And Eu preencho o campo hora com "02:01:00"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "A hora selecionada não está no formato H:i"

Scenario: criar uma postagem  do tipo evento com data anterior invalida
    Given Eu estou logado como "Sol" com email "sol@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "evento novo"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "evento"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu preencho o campo data com "1995-05-26"
    And Eu preencho o campo hora com "15:00"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "A data selecionada tem que ser posterior a hoje"

Scenario: criar uma postagem  do tipo evento invalida sem hora
    Given Eu estou logado como "Sol" com email "sol@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "evento novo"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "evento"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu preencho o campo data com "2050-06-26"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "Selecionar á hora quando a postagem for um evento é obrigatório"

Scenario: criar uma postagem  do tipo evento invalida sem data
    Given Eu estou logado como "Sol" com email "sol@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "evento novo"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "evento"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu preencho o campo hora com "15:00"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "Selecionar data quando a postagem for um evento é obrigatório"

Scenario: atualizar hora em branco invalida de uma postagem evento
    Given Eu estou logado como "Josy" com email "Josy@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "evento 2050"
    When Eu edito a hora para ""
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "Selecionar á hora quando a postagem for um evento é obrigatório"

Scenario: atualizar data em branco invalida de uma postagem evento
    Given Eu estou logado como "Josy" com email "Josy@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "evento 2050"
    When Eu edito a data para ""
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "Selecionar data quando a postagem for um evento é obrigatório"

Scenario: atualizar hora com formato invalido de uma postagem evento
    Given Eu estou logado como "Josy" com email "Josy@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "evento 2050"
    When Eu edito a hora para "02:01:00"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "A hora selecionada não está no formato H:i"

Scenario: atualizar data anterior invalida de uma postagem evento
    Given Eu estou logado como "Josy" com email "Josy@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    And Eu clico em Editar a postagem com titulo "evento 2050"
    When Eu edito a data para "1995-05-26"
    And Eu clico em Publicar agora
    Then Eu vejo a mensagem de erro "A data selecionada tem que ser posterior a hoje"

Scenario: criar uma postagem valida do tipo edital
    Given Eu estou logado como "Marcela" com email "mar@admin.com" e senha "12345678"
    And Eu estou na pagina de postagens
    Then Eu abro a pagina de criar postagem
    When Eu preencho o campo titulo com "postagem edital"
    And Eu preencho o campo descricao com "Recebemos alunos da escola EREMG"
    And Eu seleciono o campo tipo da postagem "edital"
    And Eu clico em Escolher arquivo e escolho "anexo.png"
    And Eu clico em Publicar agora
    Then Eu vejo que a postagem com titulo "postagem edital" foi salva com sucesso
