function ativarContraste() {
    var linkCssContraste = document.getElementById("css-contraste");
    if( linkCssContraste === null) {
        linkCssContraste = document.createElement("link");
        linkCssContraste.rel = "stylesheet";
        linkCssContraste.href = "/css/style_contraste.css";
        linkCssContraste.id = "css-contraste";
        document.querySelector("head").appendChild(linkCssContraste);
    } else {
        linkCssContraste.id = "";
        linkCssContraste.href = "";
    }
}

// Recuperar config. de contraste
var contrasteCookie = getCookie("contraste");
if(contrasteCookie === "true") {
    ativarContraste();
}


$(".bt-tema").on("click", function(e) {
    ativarContraste();
    if(contrasteCookie === "true") {
        setCookie("contraste", "false", {secure: true})
    } else {
        setCookie("contraste", "true", {secure: true})
    }
});


