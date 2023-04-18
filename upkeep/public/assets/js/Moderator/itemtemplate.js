
// Global varible for itemtemplate details
var itemtemplateDetails = null;

elements = document.getElementsByTagName("td")
for (var i = elements.length; i--;) {
  if (elements[i].innerHTML === "Pending") {
   //  elements[i].style.color = "red";
   elements[i].classList.add("danger");

  }
  if (elements[i].innerHTML === "Approved") {
   //  elements[i].style.color = "green";  
    elements[i].classList.add("success"); }}



function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("txtHint");
  filter = input.value.toUpperCase();
  table = document.getElementById("templateTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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


// "use strict";
function fun(id) {
  // Get all DOM and store in variable
  const modal = document.querySelector(".popupview");
  const overlay = document.querySelector(".overlayview");
  const btnCloseModal = document.querySelector(".closebtn1");
  const confirmbtn = document.querySelector(".confirmbtn");
   const autoclick = document.querySelector(".autoclick");
  const btnShowRow1 = document.querySelector(".delete");
  var itemtemplate_id = id;



  // Show Modal function const showModal
  const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
  };

  // Close Modal function
  const closeModal = function () {
    console.log("button clicked");
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
  };


  // show modal click event
  btnShowRow1.addEventListener("click", showModal);

  // close modal click
  btnCloseModal.addEventListener("click", closeModal);
  // overlay.addEventListener("click", closeModal);
  confirmbtn.addEventListener("click", ajax_deleteItem(itemtemplate_id));
  
  function ajax_deleteItem(id) {
    const item_id = id;
    const form = new FormData();
    form.append("action", "deleteItem");
    form.append("id", item_id);
  
    const urlparams = new URLSearchParams(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/deleteItems");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      if (xhr.status === 200) {
        const res = xhr.responseText;
        console.log(id);
        // If the request was successful, delete the row from the table
        // row.parentNode.removeChild(row);
        // } else {
        // If the request failed, display an error message
        //   alert("Failed to delete row");
      }
    }
    xhr.send(urlparams);
  
    // Your code to delete the row from the database goes here
     closeModal();
     autoclick.click();
  
  
  }


};




document.addEventListener("DOMContentLoaded", function () {
  ajax_getItems();
});

function ajax_getItems() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/completeItemTemplates", "true");

  xhr.onload = function () {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      //  const json = JSON.parse(res);
      // console.log(json);
      // try {
      const json = JSON.parse(res);
      itemtemplateDetails = JSON.parse(res);
      // console.log(itemtemplateDetails[1]);
      // }
      // catch (error) {
      // console.log('Error parsing JSON:', error, res);
      // }
      var html = "";

      for (var i = 0; i < json.length; i++) {
        console.log(json.length);
        // html += "<tbody>";
        html += "<tr>";
        // html += "<td><input type='checkbox' name='id'></td>";
        html += "                <td class='template_name'>";
        html += "                     <div class='image'>";
        html += "<img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/" + json[i].image + "'>";
         console.log(json[i].id);
        html += "</div>";
        html += "                        <div class='name'>" + json[i].itemtemplate_name + "";

        html += "                    </div>";
        html += "                     </td>";
        // html += "                <td><"+json[i].type_name+"</td>";
        html += "                        <td>" + json[i].type_name + "</td>";
        html += " <td id='status'";
        if (json[i].status == 'Approved') {
          // console.log(json[i].status);
          html += "class='success'>";
        } else {

          // console.log(json[i].status);
          html += "class = 'danger'>";
        }
        html += "" + json[i].status + "</td>";
        html += "                        <td class='des_color'>" + json[i].description + "</td>";
        html += "                       <td>";
        html += " <div class='more'>  ";
        //                var id = encodeURIComponent(json[i].id);
        // var name = encodeURIComponent(json[i].itemtemplate_name);                        
        html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem/" + json[i].id + "'><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button type='button' onclick='fun("+ json[i].id +")'><span class='material-icons-sharp'>delete</span></button></div>";
        //  html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem/?id=id'&name= name'><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button><span class='material-icons-sharp'>delete</span></button></div>"
        // html += "<div class='view'><button onclick='passItemDetails("+i+")'><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button type='button' onclick='fun()'><span class='material-icons-sharp'>delete</span></button></div>";
        html += "                </div>";
        html += "                </td>";
        html += "                </tr>";
        // var id = json[i].id;

      }
      document.querySelector(".details").innerHTML = html;
    }
  }
  xhr.send();


}

function passItemDetails(i) {

  const xhr = new XMLHttpRequest();
  var x = console.log(itemtemplateDetails[i].itemtemplate_name);
  var y = console.log(itemtemplateDetails[i].id);


  xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem/", "true");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  console.log(itemtemplateDetails[i]);
  xhr.onload = function () {
    if (xhr.status == 200) {
      const res = xhr.responseText;
    }
  }
  xhr.send();
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("templateTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    console.log(rows.length);
    
    /*Loop through all table rows (except the
   first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      console.log(x.innerHTML);
      y = rows[i + 1].getElementsByTagName("td")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      //  console.log(y.innerHTML);
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          console.log(x);
          console.log(y);
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          console.log(x);
          console.log(y);
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function showDropdwn() {

  var select = document.getElementById("main-dropdwn");
  if(select.style.display === "none")
  {
  select.style.display = "block";
  }
  else{
    select.style.display= "none";
  }
}

const dropdown = document.getElementById("main-dropdwn");
const table = document.getElementById("templateTable");

dropdown.addEventListener("change", function() {
  const selectedValue = this.value;
  console.log(selectedValue);
  const rows = table.getElementsByTagName("tr");
  
  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const status = row.getElementsByTagName("td")[2];
    const itemType = row.getElementsByTagName("td")[1];
    
    if (status && itemType) {
      const statusValue = status.textContent || status.innerText;
      const itemTypeValue = itemType.textContent || itemType.innerText;
      
      if ( selectedValue === "1" && statusValue === "Approved" || selectedValue === "2" && statusValue === "Pending" || selectedValue === "5" && itemTypeValue === "Vehicle" || selectedValue === "6" && itemTypeValue === "Personal" || selectedValue === "3" && itemTypeValue === "House Hold" || selectedValue === "4" && itemTypeValue === "Office") {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }
});









