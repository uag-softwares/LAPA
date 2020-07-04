@material
Feature: material
  In order to gerenciar o sistema LAPA
  As a cliente
  I need to ser capaz de criar,editar,atualizar,deletar materiais

  Scenario: criar material valido
    Given Eu estou logado como "roberto" com email "roberto@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com "Material de Ihc"
    And   Eu preencho o campo texto com "Esse material e referente a disciplina ES"
    And   Eu clico em escolher arquivo e escolho "arquivo.pdf"
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em Publicar agora
    Then  Eu vejo que o material foi adicionado corretamente

  Scenario: criar material sem nome
    Given Eu estou logado como "roberto" com email "roberto@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com ""
    And   Eu preencho o campo texto com "Esse material e referente a disciplina ES"
    And   Eu clico em escolher arquivo e escolho "arquivo.pdf"
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "Título do material é obrigatório"

  Scenario: criar material com nome muito curto
    Given Eu estou logado como "roberto" com email "roberto@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com "Ma"
    And   Eu preencho o campo texto com "Esse material e referente a disciplina ES"
    And   Eu clico em escolher arquivo e escolho "arquivo.pdf"
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "Título deve conter no mínimo três letras"

  Scenario: criar material sem texto
    Given Eu estou logado como "roberto" com email "roberto@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com "Material 1"
    And   Eu preencho o campo texto com ""
    And   Eu clico em escolher arquivo e escolho "arquivo.pdf"
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "Escrever sobre o texto é obrigatório"

  Scenario: criar material sem anexo
    Given Eu estou logado como "roberto" com email "roberto@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com "Material 1"
    And   Eu preencho o campo texto com ""
    And   Eu seleciono a disciplina "Ihc"
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "O campo anexo é obrigatório."

  Scenario: criar material sem disciplina
    Given Eu estou logado como "damiao" com email "damiao@admin.com" e senha "12345678"
    And   Eu estou na pagina de adicionar materiais
    When  Eu preencho o campo titulo com "Material 1"
    And   Eu preencho o campo texto com "Descricao do material 1 escrita"
    And   Eu clico em escolher arquivo e escolho "anexo.png"
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "Escolher disciplina é obrigátorio"

  Scenario: atualizar material com titulo em branco
    Given Eu estou logado como "damiao" com email "damiao@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   O material "Material de Ihc" ja exista
    And   Eu estou na pagina de gerenciar materiais
    And   Eu clico em editar material com titulo "Material de Ihc"
    When  Eu edito o campo titulo para " "
    And   Eu clico em Publicar agora
    Then  Eu vejo erro ao adicionar material em branco

  Scenario: atualizar material com titulo muito curto
    Given Eu estou logado como "carlos" com email "carlos@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   O material "Material de Ihc" ja exista
    And   Eu estou na pagina de gerenciar materiais
    And   Eu clico em editar material com titulo "Material de Ihc"
    When  Eu edito o campo titulo para "Ih"
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "Título deve conter no mínimo três letras"

  Scenario: atualizar material sem texto
    Given Eu estou logado como "carlos" com email "carlos@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   O material "Material de Ihc" ja exista
    And   Eu estou na pagina de gerenciar materiais
    And   Eu clico em editar material com titulo "Material de Ihc"
    When  Eu edito o campo titulo para "Material de ihc atualizado"
    And   Eu edito o campo texto para ""
    And   Eu clico em Publicar agora
    Then  Eu vejo a mensagem de erro "Escrever sobre o texto é obrigatório"

 Scenario: deletar material valido
    Given Eu estou logado como "carlos" com email "carlos@admin.com" e senha "12345678"
    And   A disciplina "Ihc" ja exista
    And   O material "Material de Ihc" ja exista
    And   Eu estou na pagina de gerenciar materiais
    When  Eu clico em deletar material com titulo "Material de Ihc"
    Then  Eu vejo que o material foi deletado corretamente