const popups = document.getElementsByClassName('popup');
const overlay = document.getElementById('overlay');
const closeBtns = document.querySelectorAll('.close');
closeBtns.forEach((btn)=>{
    btn.addEventListener('click',()=>{
        closePopup(btn.parentElement.id);
    });
});
console.log(ROOT);


function openPopup(id){
    overlay.classList.remove('hidden')
    popups[id].classList.remove('hidden');
}

function closePopup(id){
    overlay.classList.add('hidden');
    popups[id].classList.add('hidden');
}


function finish(id){
    overlay.classList.add('hidden');
    popups[id].classList.add('hidden');
    window.location.reload();
}

function formSuccessfull(id,success_title,success_message){
    popups[id].querySelectorAll('.content').forEach((content)=>{
        content.classList.contains('hidden')?content.classList.remove('hidden'):content.classList.add('hidden');
    });
    popups[id].querySelector('.content#msg').innerHTML = "" +
        "<div class=\"middle\">\n" +
        "   <div class=\"icon-container\">\n" +
        "       <span class=\"material-icons-sharp\" id=\"success-icon\">check_circle</span>\n" +
        "   </div>\n" +
        "   <h1 id=\"success-title\">"+success_title+"</h1>\n" +
        "   <p id=\"success-message\">"+success_message+"</p><br>\n" +
        "   <div class=\"btn-container\">\n" +
        "       <button id=\"finish\">Continue!</button>\n" +
        "   </div>\n" +
        "</div>"
}


function areYouSure(id,areYouSureMessage){
    popups[id].querySelectorAll('.content').forEach((content)=>{
        content.classList.contains('hidden')?content.classList.remove('hidden'):content.classList.add('hidden');
    });
    popups[id].querySelector('.content#msg').innerHTML = "" +
        "<div class=\"middle\">\n" +
        "   <div class=\"icon-container\">\n" +
        "       <span class=\"material-icons-outlined warning\" id=\"warning-icon\">error_outline</span>\n" +
        "   </div>\n" +
        "   <h1 id=\"warning-title\" >Are you sure?</h1>\n" +
        "   <p id=\"warning-message\">"+areYouSureMessage+"</p><br>\n" +
        "   <div class=\"btn-container\">\n" +
        "       <button id=\"yes\">Yes</button>\n" +
        "       <button id=\"no\">No</button>\n" +
        "   </div>\n" +
        "</div>"

    popups[id].querySelector('#yes').addEventListener('click',()=>{
        //set the form visible in next click
        popups[id].querySelectorAll('.content').forEach((content)=>{
            content.classList.contains('hidden')?content.classList.remove('hidden'):content.classList.add('hidden');
        });
        closePopup(id);
    });
    popups[id].querySelector('#no').addEventListener('click',()=>{
        //go backto the form
        popups[id].querySelectorAll('.content').forEach((content)=>{
            content.classList.contains('hidden')?content.classList.remove('hidden'):content.classList.add('hidden');
        });

    });
}



const input_files = document.querySelectorAll('input.img-input');
console.log(input_files);
input_files.forEach((input)=>{
    input.addEventListener('change',(event)=>{
        // if(input.files.length > 0) {
        //     const file = input.files[0];
        //     const reader = new FileReader();
        //     reader.onload = function () {
        //         input.parentElement.parentElement.querySelector('img').src = reader.result;
        //     }
        //     a=reader.readAsDataURL(file);
        //     console.log(a);
        //     console.log(input.value);
        // }
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = input.parentElement.parentElement.querySelector('img');
            preview.src = src;
            preview.style.display = "block";
        }
    });
});


// show input error message
function showErrors(input, message) {
    const inputField = input.parentElement;
    inputField.className = 'input-field error';
    const small = inputField.querySelector('small');
    small.innerText = message;
}

function clearErrors(popupid) {
    popups[popupid].querySelectorAll('.input-field').forEach((inputField)=>{
        inputField.className = 'input-field';
    });
}

//
// function showPreview(event) {
//     if (event.target.files.length > 0) {
//         var src = URL.createObjectURL(event.target.files[0]);
//         var preview = document.getElementById("file-ip-1-preview");
//         preview.src = src;
//         preview.style.display = "block";
//     }
// }

