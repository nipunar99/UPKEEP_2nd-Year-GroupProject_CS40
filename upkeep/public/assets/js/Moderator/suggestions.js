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


function openComplaints(evt, complaintName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("item");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
      console.log("a");
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
      console.log("a");
    }
    document.getElementById(complaintName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();

  document.addEventListener("DOMContentLoaded", function () {
    ajax_getSuggestionItems();
  
});

function ajax_getSuggestionItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Suggestion/getItemSuggestions", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            itemtemplateDetails = JSON.parse(res);
            var html = "";

            for (var i = 0; i < json.length; i++) {
                console.log(json.length);

                // html += "";
                html += "<div class='card-main' role='button'>";
                html += "<a href='http://localhost/upkeep/upkeep/public/Moderator/Suggestion/viewSuggestions/"+json[i].id+"'><img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/" + json[i].image + "'></a>";
                html +="<div class='text'>";
                html += "<h3><b>"+json[i].category_name+"</b></h3>";

                html += "<p>"+json[i].itemtemplate_name+"</p>";
                html += "</div>";
                html += "</div>";
                // html += "</a>";
               


            }
            document.querySelector(".card-mainn").innerHTML = html;
        }
    }
    xhr.send();


}