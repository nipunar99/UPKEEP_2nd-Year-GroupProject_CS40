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
    popups[id].querySelector('.content').innerHTML = "" +
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

//
// function showPreview(event) {
//     if (event.target.files.length > 0) {
//         var src = URL.createObjectURL(event.target.files[0]);
//         var preview = document.getElementById("file-ip-1-preview");
//         preview.src = src;
//         preview.style.display = "block";
//     }
// }

