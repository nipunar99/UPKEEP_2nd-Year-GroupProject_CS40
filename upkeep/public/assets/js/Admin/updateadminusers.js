// const updateAdministrativeBtn = document.getElementById("save_changes");

// updateAdministrativeBtn.addEventListener('click',ajax_call);
//document.getElementById("add_admin").addEventListener('click',add_admin);

function ajax_updateAdminUsers(id){

    // const formItemDetails = document.getElementById("form_itemDetails");
    const addupdated_details = document.getElementById("addUpdated-details");

    console.log(addupdated_details);
    const form = new FormData(addupdated_details);
    form.append("action","updateadminmoderator");
    form.append("user_id",id);
   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Addmoderator/addUpdatedfunc");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);

}

function ajax_removeAdminUsers(user_id){
    // const removeBtn = document.getElementById("remove-adminusers");

    // console.log(removeBtn);
    const form = new FormData();
    form.append("action","removeadminmoderator");
    form.append("user_id",user_id);
   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Addmoderator/removefunc");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);
}

