document.addEventListener("DOMContentLoaded", function () {
    ajax_getSuggestionItems();
  
});

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

  document.getElementById("defaultOpen").click();



function ajax_getSuggestionItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST","" + ROOT + "/Moderator/Suggestion/getItemSuggestions", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            itemtemplateDetails = JSON.parse(res);
            var html = "";

            for (var i = 0; i < json.length; i++) {
                console.log(json.length);

                html += "<div class='card-main' role='button'>";
                html += "<a href='"+ROOT+"/Moderator/Suggestion/viewSuggestions/"+json[i].id+"'><img src='"+ROOT+"/assets/images/uploads/" + json[i].image + "'></a>";
                html +="<div class='text'>";
                html += "<div class='warning'><h3>"+json[i].category_name+"</h3></div>";
                html += "<p>"+json[i].itemtemplate_name+"</p>";
                html += "</div>";
                html += "</div>";
            }
            document.querySelector(".card-mainn").innerHTML = html;
        }
    }
    xhr.send();
}

function showDropdwn() {

    var select = document.getElementById("main-dropdwn");
    if (select.style.display === "none") {
      select.style.display = "block";
    }
    else {
      select.style.display = "none";
    }
  }
  
  const dropdown = document.getElementById("main-dropdwn");
  const table = document.getElementById("item");
  
  dropdown.addEventListener("change", function () {
    const selectedValue = this.value;
    console.log(selectedValue);
    
    const rows = table.querySelectorAll(".card-mainn");
  
    for (let i = 0; i < rows.length; i++) {
      const row = rows[i];
      const itemType = row.getElementsByTagName("h3");
      if (itemType) {
        const itemTypeValue = itemType[i].textHTML || itemType[i].innerText;
        console.log(itemTypeValue);
        if ( selectedValue === "3" && itemTypeValue === "Tools and equipment" || selectedValue === "4" && itemTypeValue === "Vehicles" || selectedValue === "6" && itemTypeValue === "Home and garden" || selectedValue === "7" && itemTypeValue === "Other" || selectedValue === "1" && itemTypeValue === "Electronics" || selectedValue === "5" && itemTypeValue === "Furniture" || selectedValue === "2" && itemTypeValue === "Appliances") {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      }
    }
  });
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    table = document.getElementById("cd");
    input = document.getElementById("txtHint");
    filter = input.value.toUpperCase();
    
    tr = table.getElementsByClassName(".warning");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByClassName(".warning")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          console.log(tr[i]);
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }