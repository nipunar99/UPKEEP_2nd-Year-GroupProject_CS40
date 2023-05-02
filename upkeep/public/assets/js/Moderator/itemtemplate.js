
// Global varible for itemtemplate details
var itemtemplateDetails = null;

elements = document.getElementsByTagName("td")
for (var i = elements.length; i--;) {
  if (elements[i].innerHTML === "Pending") {
    elements[i].classList.add("danger");

  }
  if (elements[i].innerHTML === "Approved") {
    elements[i].classList.add("success");
  }
}



function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("txtHint");
  filter = input.value.toUpperCase();
  table = document.getElementById("templateTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
  };


  // show modal click event
  btnShowRow1.addEventListener("click", showModal);

  // close modal click
  btnCloseModal.addEventListener("click", closeModal);
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
      }
    }
    xhr.send(form);

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
      const json = JSON.parse(res);
      itemtemplateDetails = JSON.parse(res);
      var html = "";

      for (var i = 0; i < json.length; i++) {
        console.log(json.length);
      
        html += "<tr>";
        html += "                <td class='template_name'>";
        // html += "                     <div class='image'>";
        html += "<img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/" + json[i].image + "'>";
        console.log(json[i].id);
        // html += "</div>";
        html += "                        " + json[i].itemtemplate_name + "";

        // html += "                    </div>";
        html += "                     </td>";
        html += "                        <td>" + json[i].category_name + "</td>";
        html += " <td id='status'";
        if (json[i].status == 'Approved') {
          html += "class='success'>";
        } else {

          html += "class = 'danger'>";
        }
        html += "" + json[i].status + "</td>";
        html += "                        <td class='des_color'>" + json[i].description + "</td>";
        html += "                       <td>";
        html += " <div class='more'>  ";                        
        html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/viewItem/" + json[i].id + "'><span class='material-icons-sharp'>visibility</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button type='button' onclick='fun(" + json[i].id + ")'><span class='material-icons-sharp'>delete</span></button></div>";
        html += "                </div>";
        html += "                </td>";
        html += "                </tr>";


      }
      document.querySelector(".details").innerHTML = html;
    }
  }
  xhr.send();


}

// function passItemDetails(i) {

//   const xhr = new XMLHttpRequest();
//   var x = console.log(itemtemplateDetails[i].itemtemplate_name);
//   var y = console.log(itemtemplateDetails[i].id);


//   xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/viewItem/", "true");
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   console.log(itemtemplateDetails[i]);
//   xhr.onload = function () {
//     if (xhr.status == 200) {
//       const res = xhr.responseText;
//     }
//   }
//   xhr.send();
// }

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
  if (select.style.display === "none") {
    select.style.display = "block";
  }
  else {
    select.style.display = "none";
  }
}

const dropdown = document.getElementById("main-dropdwn");
const table = document.getElementById("templateTable");

dropdown.addEventListener("change", function () {
  const selectedValue = this.value;
  console.log(selectedValue);
  
  const rows = table.getElementsByTagName("tr");

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const status = row.getElementsByTagName("td")[2];
    const itemType = row.getElementsByTagName("td")[1];

    if (status && itemType) {
      const statusValue = status.textContent || status.innerText;
      console.log(statusValue);
      const itemTypeValue = itemType.textContent || itemType.innerText;

      if (selectedValue === "1" && statusValue === "Approved" || selectedValue === "2" && statusValue === "Pending" || selectedValue === "5" && itemTypeValue === "Tools and equipment" || selectedValue === "6" && itemTypeValue === "Vehicles" || selectedValue === "8" && itemTypeValue === "Home and garden" || selectedValue === "9" && itemTypeValue === "Other" || selectedValue === "3" && itemTypeValue === "Electronics" || selectedValue === "7" && itemTypeValue === "Furniture" || selectedValue === "4" && itemTypeValue === "Appliances") {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }
});









