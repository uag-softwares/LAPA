

window.onload = function() {
    var elementBody = document.querySelector(":root");
    var elementBtnIncreaseFont = document.getElementById("increase-font");
    var elementBtnDecreaseFont = document.getElementById("decrease-font");
    var elementBtnReseteFont = document.getElementById("resete-font");

    
    // Padrão de tamanho, equivale a 100% do valor definido no Body
    var fontSize = 100;
    // Valor de incremento ou decremento, equivale a 10% do valor do Body
    var increaseDecrease = 10;

    // Evento de click para aumentar a fonte
    elementBtnIncreaseFont.addEventListener("click", function(event) {
        if(fontSize <= 140){
            fontSize = fontSize + increaseDecrease;
            elementBody.style.fontSize = fontSize + "%";
            setCookie("fontSize", fontSize);
        }
       
    });

     // Evento de click para resetar a fonte
     elementBtnReseteFont.addEventListener("click", function(event) {
        elementBody.style.fontSize = "100%";
        setCookie("fontSize", fontSize);
    });

    // Evento de click para diminuir a fonte
    elementBtnDecreaseFont.addEventListener("click", function(event) {
        if(fontSize >= 80){
            fontSize = fontSize - increaseDecrease;
            elementBody.style.fontSize = fontSize + "%";
            setCookie("fontSize", fontSize)
        }

    });
}

function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";" + ";path=/";
}