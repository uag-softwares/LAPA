var radioGroupAnexo = document.getElementById("radio-group-anexo").children;

for( var i = 0, length = radioGroupAnexo.length; i < length; i++) {
    radioGroupAnexo[i].addEventListener("change", function() {
        if(this.checked) {
            document.querySelector(".form-group-anime").classList.add("show");
            if(this.value === "link_drive") {
                document.getElementById("link_drive").classList.add("show");
                document.getElementById("link_web").classList.remove("show");
                document.getElementById("upload").classList.remove("show");
            } else if(this.value === "link_web") {
                document.getElementById("link_drive").classList.remove("show");
                document.getElementById("link_web").classList.add("show");
                document.getElementById("upload").classList.remove("show");
            } else if(this.value === "upload") {
                document.getElementById("link_drive").classList.remove("show");
                document.getElementById("link_web").classList.remove("show");
                document.getElementById("upload").classList.add("show");
            }
        }
    });
}