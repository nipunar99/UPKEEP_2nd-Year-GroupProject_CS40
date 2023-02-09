// "use strict";

// Get all DOM and store in variable
const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
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

// function scrollL(){
//     var left = document.querySelector(".card-main");
//     left.scrollBy(350,0);
// }
// function scrollR(){
//     var right = document.querySelector(".card-main");
//     right.scrollBy(-350,0) ;
// }

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 40,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });