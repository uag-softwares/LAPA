// Pesquisa em materiais
$(document).ready(function(){
    $("#pesquisa_materiais").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#materiais a").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

// Pesquisa disciplina em materiais
$(document).ready(function(){
    $("#pesquisa_disciplina").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#disciplinas a").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});