function ativarContraste() {
    var linkCssContraste = document.getElementById("css-contraste");
    if( linkCssContraste.getAttribute("disabled")) {
        linkCssContraste.removeAttribute("disabled");
    } else {
        linkCssContraste.setAttribute("disabled", true);
    }
    
}

$(".bt-tema").on("click", function(e) {
    var contrasteCookie = localStorage.getItem("contraste");
    ativarContraste();
    if(contrasteCookie === "true") {
        localStorage.setItem("contraste", "false");
    } else {
        localStorage.setItem("contraste", "true");
    }
});


