var radioGroupAnexo = document.getElementById("radio-group-anexo").children;

for( var i = 0, length = radioGroupAnexo.length; i < length; i++) {
    radioGroupAnexo[parseInt(i, 10)].addEventListener("change", function() {
        if(this.checked) {
            document.querySelector(".form-group-anime").classList.add("show");
            var upload = document.getElementById("upload");
            var linkWeb = document.getElementById("link_web");
            var linkDrive = document.getElementById("link_drive");

            upload.classList.remove("show");
            linkWeb.classList.remove("show");
            if(linkDrive === undefined){
                linkDrive.classList.remove("show");
            }
           
            if(this.value === "link_drive") {
                linkDrive.classList.add("show");
            } else if(this.value === "link_web") {
                linkWeb.classList.add("show");
            } else if(this.value === "upload") {
                upload.classList.add("show");
            }
        }
    });
}