// inportant globals variables

var users;
const sendbtn = document.querySelector('.btnSend');

// Load functions that should start in the beginning
document.addEventListener("DOMContentLoaded",function(){
    ajax_loadUsers();
});


//............................ Load the paticular users ............................
function ajax_loadUsers() {
    console.log('loading users');
    const xhr = new XMLHttpRequest();

    xhr.open('GET',"http://localhost/upkeep/upkeep/public/Conversation/loadUser");

    xhr.onload = function () {
        if(xhr.status == 200){  
            const res = xhr.responseText;
            const json = JSON.parse(res);
            users = json;
            console.log(json);
            var html="";
            for( var i=0; i<json.length; i++){
                html+= "<div onclick='loadUserChat("+i+")' class='title'>";
                html+= "    <img src='http://localhost/upkeep/upkeep/public/assets/images/profile-"+(i+2)+".jpg'  alt=''class='user'>";
                
                html+= "    <div>";
                html+= "        <div class='userdetails'>";
                html+= "            <h3>"+json[i].first_name+" "+json[i].last_name+"</h3>";
                html+= "            <h4>11.14 A.M.</h4>";
                html+= "        </div>";
                html+= "        <div>";
                html+= "            <p> latest massage</p>";
                html+= "        </div>";
                html+= "    </div>";

                html+= "</div>";
                html+= "<hr>";
            }

            document.querySelector(".users").innerHTML=html;
        }

    }
    xhr.send();
}


 //....................... Load the user chat by clicking user conversation......................................
function loadUserChat(index) {

    const xhr = new XMLHttpRequest();

    xhr.open('GET',"http://localhost/upkeep/upkeep/public/Conversation/loadUserChat/"+users[index].user_id+"");

    xhr.onload = function () {
        if(xhr.status == 200){  
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html="";
            html+= "<div class='title'>";
            html+= "    <img src='http://localhost/upkeep/upkeep/public/assets/images/profile-"+(index+2)+".jpg' class='user'>";
            html+= "    <div class='titleDetails'>";
            html+= "        <h3>"+users[index].first_name+" "+users[index].last_name+"</h3>";
            html+= "        <h4>Avg. response time : <b>1 day</b></h4>";
            html+= "    </div>";
                
            html+= "</div>";
            html+= "<div class='msgtextarea'> ";
            html+= "</div>";

            document.querySelector(".massagebox").innerHTML=html;
        }

    }
    xhr.send();

}

 //....................... Massage sent to the database......................................
sendbtn.addEventListener('click', function(){
    const massage = document.querySelector(".msgDetails");
    var massageContent = massage.value;

    const form = new FormData();
    form.append("msg", massageContent);
    form.append("action", "savemsg");
    const xhr = new XMLHttpRequest();
    xhr.open("POST","http://localhost/upkeep/upkeep/public/Conversation/saveMassage");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };

    xhr.send(form);
    massage.value = "";
});


//......................... Load the massages ..................................

// Define the function to be called repeatedly
function loadMessages() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',"http://localhost/upkeep/upkeep/public/Conversation/getChatMassages");

    xhr.onload = function () {
        if(xhr.status == 200){  
            const res = xhr.responseText;
            console.log(res);
            document.querySelector(".msgtextarea").innerHTML=res;
        }

    }
    xhr.send();
}
  
  // Call the function every 500ms using setInterval
// setInterval(loadMessages, 500);
