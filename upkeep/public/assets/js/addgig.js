function ajaxpost(){
    var form = document.getElementById("addgigform");
    var data = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../app/controllers/Technician/Addgig.php");
    xhr.onload = function(){console.log(this.response);};
    xhr.send(data);

    return false;
}