// "use strict";

// Get all DOM and store in variable
const modal1 = document.querySelector(".popupview1");
const modal2 = document.querySelector(".popupview2");
const overlay = document.querySelector(".overlayview");
const btnCloseModal1 = document.querySelector(".closebtn1");
const btnCloseModal2 = document.querySelector(".closebtn2");
const btnShowRow1 = document.querySelector(".approve");
const btnShowRow2 = document.querySelector(".delete");
// const btnShowRow3 = document.querySelector(".show-r-3");
// const btnShowRow4 = document.querySelector(".show-r-4");



// Show Modal function const showModal
const showModal1 = function () {
    console.log("button clicked");
    modal1.classList.remove("hidden");
    // modal2.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal1 = function () {
    modal1.classList.add("hidden");
    // modal2.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
};


// show modal click event
btnShowRow1.addEventListener("click", showModal1);
btnShowRow2.addEventListener("click", showModal2);
// overlay.addEventListener("click",showModal);
// btnShowRow3.addEventListener("click", showModal);
// btnShowRow4.addEventListener("click", showModal);




// close modal click
btnCloseModal1.addEventListener("click", closeModal);
btnCloseModal2.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

