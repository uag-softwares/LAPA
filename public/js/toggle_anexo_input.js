var radioGroupAnexo = document.getElementById("radio-group-anexo").children;

for( var i = 0, length = radioGroupAnexo.length; i < length; i++) {
    radioGroupAnexo[i].addEventListener("change", function() {
        if(this.checked) {
            if(this.value === "link_drive") {
                document.getElementById("link_drive").style.display = "block";
                document.getElementById("link_web").style.display = "none";
                document.getElementById("upload").style.display = "none";
            } else if(this.value === "link_web") {
                document.getElementById("link_drive").style.display = "none";
                document.getElementById("link_web").style.display = "block";
                document.getElementById("upload").style.display = "none";
            } else if(this.value === "upload") {
                document.getElementById("link_drive").style.display = "none";
                document.getElementById("link_web").style.display = "none";
                document.getElementById("upload").style.display = "block";
            }
        }
    });
}