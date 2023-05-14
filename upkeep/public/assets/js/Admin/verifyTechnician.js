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

// // Check if the rejection status is stored in local storage
// document.addEventListener("DOMContentLoaded", function() {
//     var isRejected = localStorage.getItem("isRejected");
//     if (isRejected) {
//       var rejectButton = document.getElementById("reject_btn");
//       rejectButton.innerText = "Rejected";
//       rejectButton.classList.add("rejected");
//       rejectButton.disabled = true;
//     }
//   });
  
//   function reject() {
//     var rejectButton = document.getElementById("reject_btn");
//     rejectButton.innerText = "Rejected";
//     rejectButton.classList.add("rejected");
//     rejectButton.disabled = true;
  
//     // Store the rejection status in local storage
//     localStorage.setItem("isRejected", "true");
//   }
  




  
  
  
  
  
  









