// "use strict";

// Get all DOM and store in variable
const modal = document.querySelector(".popupview");

const btnCloseModal = document.querySelector(".closebtn");
const btnShowRow1 = document.querySelector(".show-r-1");
const btnShowRow2 = document.querySelector(".show-r-2");
const btnShowRow3 = document.querySelector(".show-r-3");
const btnShowRow4 = document.querySelector(".show-r-4");



// Show Modal function const showModal
const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
};


// show modal click event
btnShowRow1.addEventListener("click", showModal);
btnShowRow2.addEventListener("click", showModal);
btnShowRow3.addEventListener("click", showModal);
btnShowRow4.addEventListener("click", showModal);




// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

