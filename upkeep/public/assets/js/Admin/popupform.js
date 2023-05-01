const popups = document.getElementsByClassName('popup');
const overlay = document.getElementById('overlay');
const closeBtns = document.querySelectorAll('.close');
closeBtns.forEach((btn)=>{
    btn.addEventListener('click',()=>{
        closePopup(btn.parentElement.id);
    });
});


function openPopup(id){
    console.log(overlay);
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

function formSuccessfull(id){
    popups[id].querySelectorAll('.content').forEach((content)=>{
       if(content.id != 'success'){
           content.classList.add('hidden');
       }else{
           content.classList.remove('hidden');
       }
    });
}