function ajax_addModerator(){
    

    // const formItemDetails = document.getElementById("form_itemDetails");
    const addmoderator = document.getElementById("addModerator-details");

    console.log(addmoderator);
    const form = new FormData(addmoderator);
    form.append("action","addmoderator");
   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Addmoderator/addModeratorfunc");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);

}

// addAdminBtn.addEventListener('click',add_admin);

function ajax_addAdmin(){
 
    const addadmin = document.getElementById("admin-details");
    e.preventDefault();

    
    console.log(addadmin);

    const form = new FormData(addadmin);
    form.append("action","addadmin");

    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Addmoderator/addAdminfunc");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);

}