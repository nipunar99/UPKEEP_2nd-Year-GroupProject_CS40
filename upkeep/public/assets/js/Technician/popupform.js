const popups = document.getElementsByClassName('popup');
const overlay = document.getElementById('overlay');
const closeBtns = document.querySelectorAll('.close');
closeBtns.forEach((btn)=>{
    btn.addEventListener('click',()=>{
        closePopup(btn.parentElement.id);
    });
});
// console.log(ROOT);


function openPopup(id){
    overlay.classList.remove('hidden');
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
        "       <svg class=\"checkmark\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 52 52\"><circle class=\"checkmark__circle\" cx=\"26\" cy=\"26\" r=\"25\" fill=\"none\" /><path class=\"checkmark__check\" fill=\"none\" d=\"M14.1 27.2l7.1 7.2 16.7-16.8\" /></svg>\n" +
        "   </div>\n" +
        "   <h1 id=\"success-title\">"+success_title+"</h1>\n" +
        "   <p id=\"success-message\">"+success_message+"</p><br>\n" +
        "   <div class=\"btn-container\">\n" +
        "       <button class='btn' id=\"finish\">Continue!</button>\n" +
        "   </div>\n" +
        "</div>"

    popups[id].querySelector('#finish').addEventListener('click',()=>{
        finish(id);
    });
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
        "       <button class='btn' id=\"yes\">Yes</button>\n" +
        "       <button class='btn' id=\"no\">No</button>\n" +
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
    const inputField = input.closest('.input-field');
    inputField.className = 'input-field error';
    const small = inputField.querySelector('small');
    small.innerText = message;
}

function clearErrors(popupid) {
    popups[popupid].querySelectorAll('.input-field').forEach((inputField)=>{
        inputField.className = 'input-field';
    });
}

function clearErrorsForm(form) {
    form.querySelectorAll('.input-field').forEach((inputField)=>{
        inputField.className = 'input-field';
    });
}

function clearErrorsInput(input) {
    input.closest('.input-field').className = 'input-field';
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

