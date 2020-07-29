$(document).ready(function() {
    $("#summernote_atlas").summernote({
        lang: "pt-BR",
        placeholder: "Digite aqui o texto",
        tabsize: 2,
        height: 200,
        toolbar: [
            ["view", ["undo", "redo",]],
            ["font", ["bold", "underline", "italic"]],
           
        ],
       
    });
});


$(document).ready(function(){
    $("img").addClass("img-responsive");
    $("img").css("max-width", "100%");
});