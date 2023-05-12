

 document.getElementById("reject_btn").addEventListener('click',function(e){
    
    console.log("clicked");
    openPopup("rejecttechnician");

    id = this.dataset.technician;
    console.log(id);
    const rejectTechnicianBtn = document.getElementById("confirm_deleteBtn");
    console.log(rejectTechnicianBtn);
    rejectTechnicianBtn.addEventListener('click',function(e){
        e.preventDefault();
        console.log('clicke');
        ajax_rejectTechnician(id);
        closePopup("rejecttechnician");
    });

})

function ajax_rejectTechnician(user_id){

    const form = new FormData();
    form.append("action","rejecttechnician");
    form.append("user_id",user_id);
    console.log(user_id)
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/VerifyRequest/rejectTechnician");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);
}    

