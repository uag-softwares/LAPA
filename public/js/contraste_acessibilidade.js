window.onload = function() {
    $(".bt-tema").on("click", function(e) {
        $('body').toggleClass("contraste");
        $('footer').toggleClass("contraste");
    });
}