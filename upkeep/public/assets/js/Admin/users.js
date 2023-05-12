const banned = document.querySelectorAll("#reject-btn");


banned.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        console.log("clcked");
        openPopup("banned_user");
        console.log(btn.dataset.userid);
        
        const bannedUserBtn = document.getElementById("bannedBtn");
        bannedUserBtn.addEventListener('click',function(e){
            e.preventDefault();
           
            data = btn.dataset.userid;
            console.log(data);

            ajax_bannedUser(data);
            console.log("hello");

            closePopup("banned_user");
        });
        
})
})

function ajax_bannedUser(user_id){
    console.log("hello");


    const addbannedReason = document.getElementById("addbanned-details");

    console.log(addbannedReason);
    const form = new FormData(addbannedReason);
    form.append("action","banneduser");
    form.append("user_id",user_id);

   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/UserTab/addBannedReason");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);

}

const userView = document.querySelectorAll("#view_btn");

userView.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        console.log("clicked");
        openPopup("view_user");
    })
})
