//Elements
const btn_send_verification = document.querySelector('button#send-verification');

//evemt listeners
btn_send_verification.addEventListener('click',sendRequest);

//functions
function sendRequest(e){
    e.preventDefault();
    const form = document.getElementById("identity-verification-form");
    var data = new FormData();
    data.append("action", "sendVerificationRequest");
    data.append('id_front',form.querySelector('input#id-front').files[0]);
    data.append('id_back',form.querySelector('input#id-back').files[0]);
    data.append('id_hand',form.querySelector('input#id-hand').files[0]);
    // console.log(form.querySelector('input#id-front').files[0]);


    xhr = new XMLHttpRequest();
    xhr.open("POST", ROOT.concat("/Technician/Getverified/sendVerificationRequest"));

    xhr.onprogress = function () {
        console.log('sending');
    }

    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            console.log(res);
            formSuccessfull('identity-verification','Thank You!','Your request has been sent successfully. We will get back to you soon.');

        } else if (xhr.status == 422) {
            const res = JSON.parse(xhr.responseText);
            console.log(res);

        } else {
            const res = JSON.parse(xhr.responseText);
            console.log(res);
        }
    }

    xhr.send(data);
}