"use strict";

// Get all DOM and store in variable
const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnShowModal = document.querySelector(".show-modal");

// Show Modal function const showModal
const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; // Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
};
// show modal click event
btnShowModal.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);
// escape click event
// document.addEventListener("keydown", function (e) {
//     if (e.key === "Escape" && !modal.classList.contains("hidden")) {
//         closeModal();
//     }
// });
