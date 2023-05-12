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
        // data=btn.closest('tr').dataset.techniciandetails;
        // console.log(data)
        data = JSON.parse(btn.closest('tr').dataset.techniciandetails);
                
        popup = popups['view_user'];
        console.log(popup.querySelector('h3#first_name'));
        popup.querySelector('h3#name').innerHTML = data.first_name+" "+data.last_name;
        // popup.querySelector('h4#last_name').innerHTML = data.last_name;
        popup.querySelector('h4#user_id').innerHTML = data.user_id;
        popup.querySelector('h4#email').innerHTML = data.email;
        popup.querySelector('h4#identity_verification').innerHTML = data.identity_verification;

    })
})

// function ajax_viewUser(id){
      
//         const form = new FormData();
//         form.append("action","viewtechnician");
//         form.append("user_id",id);
       
        
//         const xhr = new XMLHttpRequest();
    
//         xhr.open("POST",""+ROOT+"/Admin/UserTab/technicianView");
    
//         xhr.onload = function(){
//             if(xhr.status == 200){
//                 const res = xhr.responseText;
//                 console.log(res);
//             }
//         }
    
//         xhr.send(form);
    
// }



