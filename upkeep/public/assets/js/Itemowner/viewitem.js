// Get all DOM and store in variable
const deleteMsg = document.querySelector(".deleteMsg");
const confirmbtn = document.querySelector(".confirmbtn");
const overlay = document.querySelector(".overlayview");
const autoclick = document.querySelector(".autoclick");
// const btnCloseModal = document.querySelector(".closebtn");
const btnCloseModal1 = document.querySelector(".closebtn1");
const deleteConfirmation = document.querySelector(".deletebtn");

// Show Modal function const showModal
const deleteMsgFunc = function () {
    console.log("button clicked");
    deleteMsg.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    console.log("button clicked");
    deleteMsg.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
};

// show modal click event
deleteConfirmation.addEventListener("click", deleteMsgFunc);

// close modal click
// btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);
confirmbtn.addEventListener("click", ajax_deleteItem);


// AJAX for the delete an item

function ajax_deleteItem(){
    const item_id = document.querySelector(".item_id").innerHTML;
    const form = new FormData();
    form.append("action","deleteItem");
    form.append("item_id",item_id);
    // console.log(item_id);
    const urlparams = new URLSearchParams(form);

    
    const xhr = new XMLHttpRequest();

    xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/ViewItem");
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }
    xhr.send(urlparams);

    closeModal();
    autoclick.click();
}