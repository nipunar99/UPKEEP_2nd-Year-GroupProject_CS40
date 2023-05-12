const verifytech = document.getElementById("verify_btn");

verifytech.addEventListener('click',function(e){
   
    console.log("clcked");
    console.log(verifytech.dataset.technician);
    data = verifytech.dataset.technician;
    console.log(data);
    ajax_verifyTechnician(data);
});

function ajax_verifyTechnician(user_id){

    const form = new FormData();
    form.append("action","verifytechnician");
    form.append("user_id",user_id);

    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/VerifyRequest/verifyTechnicianfunc");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
            location.replace(ROOT+'/Admin/VerifyRequest'); //rederect page
        }
    }

    xhr.send(form);
}

function verify(){
    var verifyBtn = document.getElementById("verify_btn");
    verifyBtn.innerText = "Verified";
    verifyBtn.disabled = true;
}

function reject(){
    var verifyBtn = document.getElementById("reject_btn");
    verifyBtn.innerText = "Rejected";
    verifyBtn.disabled = true;
}










