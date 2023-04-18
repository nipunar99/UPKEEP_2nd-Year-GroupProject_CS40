//...............................slide bar.......................
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener("click", () => {
    sideMenu.style.display = "block";
})
 closeBtn.addEventListener("click", () => {
    sideMenu.style.display = "none";
})
//...............................................................

const itempannelbtn =  document.querySelector(".itempannelbtn");
const itempannel = document.querySelector(".right");
const itempannelclosebtn = document.querySelector(".itempannelclosebtn");

itempannelbtn.addEventListener('click', () => {
    itempannel.classList.add("animateOpenRight");
    itempannel.classList.remove("animateCloseRight");
})

itempannelclosebtn.addEventListener('click', () => {
    itempannel.classList.remove("animateOpenRight");
    itempannel.classList.add("animateCloseRight");
})