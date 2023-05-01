//onload
window.onload = function (e){
    setVerificationMethodStatus();
}

//Elements
const btncontactverify = document.querySelector("button#contact-verify");
const btnidentityverify = document.querySelector("button#identity-verify");
const btnprofilesetup = document.querySelector("button#setup-profile");

//event listeners
btncontactverify.addEventListener("click",function(e){
    e.preventDefault();
    openPopup('contact-verification');
});
btnidentityverify.addEventListener("click",function(e){
    e.preventDefault();
    openPopup('identity-verification');
});
btnprofilesetup.addEventListener("click",function(e){
    e.preventDefault();
    openPopup('profile-setup');
});

//Functions
function setVerificationMethodStatus(){
    const verificationMethods = document.getElementsByClassName("method-card");
    if(technician_data[0].contact_verification == "verified"){
        verificationMethods['contact-verification'].classList.add("success");
        verificationMethods['contact-verification'].querySelector('span').innerHTML = "mobile_friendly";
        verificationMethods['contact-verification'].querySelector('p.status').innerHTML = "Verified";
    }

    if(technician_data[0].identity_verification == "verified"){
        verificationMethods['identity-verification'].classList.add("success");
        verificationMethods['identity-verification'].querySelector('span').innerHTML = "how_to_reg";
        verificationMethods['identity-verification'].querySelector('p.status').innerHTML = "Verified";
    }else if(technician_data[0].identity_verification == "pending"){
        verificationMethods['identity-verification'].classList.add("pending");
        verificationMethods['identity-verification'].querySelector('span').innerHTML = "pending_actions";
        verificationMethods['identity-verification'].querySelector('p.status').innerHTML = "Pending";
    }

    //check whether the technicians profile contains no empty fields
    if(technician_data[0].description != null && technician_data[0].experience != null && technician_data[0].location != null ){
        verificationMethods['profile-verification'].classList.add("success");
        verificationMethods['profile-verification'].querySelector('span').innerHTML = "done";
        verificationMethods['profile-verification'].querySelector('p.status').innerHTML = "Completed";
    }
}


//upload image input field
// const uploadFile = document.getElementById("upload-file");
// const previewImage = document.getElementById("preview");
//
// uploadFile.addEventListener("change", function() {
//     const file = this.files[0];
//
//     if (file) {
//         const reader = new FileReader();
//
//         reader.addEventListener("load", function() {
//             previewImage.setAttribute("src", this.result);
//         });
//
//         reader.readAsDataURL(file);
//     }
// });
