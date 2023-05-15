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
// const cities = document.getElementById("city");
const districts = document.getElementById("district");
const cities = document.getElementById("city");

//populate districts
function populateDistricts() {
    // console.log("populateDistricts called");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
    xhr.send();

    xhr.onload = function () {
        if (this.status == 200) {
            const districtsObj = JSON.parse(this.responseText);
            // console.log(districtsObj);
            let output = "";
            output += `<option value="" selected disabled>Select District</option>`;
            for (let district in districtsObj) {
                output += `<option value="${district}">${district}</option>`;
            }
            districts.innerHTML = output;
        }
    };
}

populateDistricts();

//populate cities
function populateCities(district) {
    // console.log("populateCities called");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
    xhr.send();

    xhr.onload = function () {
        if (this.status == 200) {
            const citiesObj = JSON.parse(this.responseText);
            // console.log(citiesObj);
            let output = "";
            output += `<option value="" selected disabled>Select City</option>`;
            for (let city of citiesObj[district].cities) {
                output += `<option value="${city}">${city}</option>`;
            }
            cities.innerHTML = output;
        }
    };
}

//event listner for district change
districts.addEventListener("change", function () {
    // console.log("district changed");
    populateCities(this.value);
});



//complete profile form
const completeProfileForm = document.getElementById("complete-profile-form");
const completeProfileFormBtn = document.getElementById("complete-profile-form-btn");

//validate data also
completeProfileFormBtn.addEventListener("click", function (e) {
    e.preventDefault();
    // console.log("completeProfileFormBtn clicked");

    const description = document.getElementById("description").value;
    const experience = document.getElementById("experience").value;
    const district = document.getElementById("district").value;
    const city = document.getElementById("city").value;

    if (description == "" || experience == "" || district == "" || city == "") {
        alert("Please fill all the fields");
    } else {
        const data = {
            description: description,
            experience: experience,
            location: {
                district: district,
                city: city,
            },
        };

        // console.log(data);

        const xhr = new XMLHttpRequest();
        data =new FormData(completeProfileForm);

        xhr.open("POST", ROOT+"/getVerified/completeProfile", true);

        xhr.onload = function () {
            if (this.status == 200) {
                // console.log(this.responseText);
                const response = JSON.parse(this.responseText);
                if (response.status == "success") {
                    setTimeout(function () {
                        showSuccess('complete-profile');
                    }, 1000);
                    window.location.reload();
                } else {
                    alert("Something went wrong");
                }
            }
        }

        xhr.send(data);

    }
}
