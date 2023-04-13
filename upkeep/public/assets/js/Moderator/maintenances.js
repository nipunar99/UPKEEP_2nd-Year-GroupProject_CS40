

const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
//const btnCloseModal = document.querySelector(".closebtn");
const btnShowRow1 = document.querySelector(".subcategory");




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
};

// show modal click event
btnShowRow1.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);
