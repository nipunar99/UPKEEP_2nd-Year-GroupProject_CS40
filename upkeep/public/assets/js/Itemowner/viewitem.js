// Get all DOM and store in variable
const deleteMsg = document.querySelector(".deleteMsg");
const overlay = document.querySelector(".overlayview");
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

