var errocheckflag = 0;
const Input = document.querySelector('#itemtemplate_name');
const Status = document.querySelector('#Status');
const description = document.querySelector('#description');

elements = document.getElementsByTagName("td")
for (var i = elements.length; i--;) {
  if (elements[i].innerHTML === "Pending") {
    elements[i].classList.add("danger");

  }
  if (elements[i].innerHTML === "Approved") {
    elements[i].classList.add("success");
  }
}

////////////////////////////////////////////
//search function

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  table = document.getElementById("templateTable");
  input = document.getElementById("txtHint");
  filter = input.value.toUpperCase();
  
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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



  // Get all DOM and store in variable
  const modal = document.querySelector(".popupview");
  const overlay = document.querySelector(".overlayview");
  const btnCloseModal = document.querySelector(".closebtn1");
  var itemtemplate_id = id;
  const form1 = document.querySelector('#popup-form1');


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
  btnCloseModal.addEventListener("click", function (e) {
    e.preventDefault();
    closeModal();
});
var Table = document.getElementById("templateTable");
const rows = Table.getElementsByTagName("tr");
  // confirmbtn.addEventListener("click", ajax_deleteItem(itemtemplate_id));
  function setEventListner() {
    const btnShowRows = document.querySelectorAll(".edit");
    btnShowRows.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            console.log('click');
            showModal();
            var row = button.closest('tr');

            // Get the row ID
            var rowId = row.id;

            // Get the values from the row
            var cell1 = row.getElementsByTagName("td")[1].innerHTML;
            console.log(cell1);

            const xhr = new XMLHttpRequest();
            xhr.open('GET', "" + ROOT + "/Moderator/Itemtemplate/editParentItemtemplate/" + cell1);
            // console.log(xhr);
            xhr.onload = function () {
                if (xhr.status == 200) {
                    const res = xhr.responseText;
                    // console.log(res);
                    const json = JSON.parse(res);
                    console.log(json);

                    for (var i = 0; i < json.length; i++) {
                        console.log(json.length);

                        form1.querySelector("#itemtemplate_name").value = json[0].itemtemplate_name;
                        form1.querySelector("#Status").value = json[0].status;
                        form1.querySelector("#category").value = json[0].category_name;
                        form1.querySelector("#description").value = json[0].description;
                        // form2.querySelector("#Upfile").value = json[0].image;
                    }
                }
            }
            console.log();
            xhr.send();

        })
    });
}

const DistrictSelect = document.getElementById("Status");

const District = ['Approved', 'Pending'];

(function populateDistrict() {
    for (let i = 0; i < District.length; i++) {
        const option = document.createElement('option');
        option.textContent = District[i];
        DistrictSelect.appendChild(option);
    }
    DistrictSelect.value = 'Select the status';
})();

const categorytSelect = document.getElementById("category");

const Category = ['Electronics', 'Appliances', 'Tools and equipment', 'Vehicles', 'Furniture', 'Home and garden', 'Other'];

(function populateDistrict() {
  for (let i = 0; i < Category.length; i++) {
    const option = document.createElement('option');
    option.textContent = Category[i];
    categorytSelect.appendChild(option);
  }
  categorytSelect.value = 'Select category';
})();


document.addEventListener("DOMContentLoaded", function () {
  ajax_getItems();
});

function ajax_getItems() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/completeItemTemplates", "true");
console.log(xhr);
  xhr.onload = function () {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      const json = JSON.parse(res);
      var html = "";

      for (var i = 0; i < json.length; i++) {
        console.log(json.length);
      
        html += "<tr>";
        html += "<td><input type='checkbox' name='id[]' class='item_id' id='myCheckbox' onchange='toggleDeleteButton()'></td>";
        html += "<td class='hidden_id'>"+json[i].id+"</td>";
        html += " <td class='template_name'>";
        html += "<img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/" + json[i].image + "'>";
        console.log(json[i].id);
        html += "" + json[i].itemtemplate_name + "";
        html += "</td>";
        html += "<td>" + json[i].category_name +"</td>";
        html += " <td id='status'";
        if (json[i].status == 'Approved') {
          html += "class='success'>";
        } else {

          html += "class = 'danger'>";
        }
        html += "" + json[i].status + "</td>";
        html += "<td class='des_color'>" + json[i].description + "</td>";
        html += "<td>";
        html += "<div class='more'>  ";                        
        html += "<div class='view'><a href='http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/viewItem/"+json[i].id+"'><button class='view'>view</a></button></div>&nbsp;<div class='delete'><button class='edit'>edit</button></div>";
        html += "</div>";
        html += "</td>";
        html += "</tr>";


      }
      document.querySelector(".details").innerHTML = html;
      setEventListner();
      console.log(res);
    }
  }
  xhr.send();


}
////////////////////////////////////////////////////////////
//filter option
function showDropdwn() {
  // dropdown show and hide
  var select = document.getElementById("main-dropdwn");
  if (select.style.display === "none") {
    select.style.display = "block";
  }
  else {
    select.style.display = "none";
  }
}
//select dropdown option and filter
const dropdown = document.getElementById("main-dropdwn");
const table = document.getElementById("templateTable");

dropdown.addEventListener("change", function () {
  //get the dropdown select value as integer
  const selectedValue = this.value;
  console.log(selectedValue);
  
  const rows = table.getElementsByTagName("tr");

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    //get the value of status and itemtype in eachrow of the table
    const status = row.getElementsByTagName("td")[4];
    const itemType = row.getElementsByTagName("td")[3];

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

//delete itemtemplate
function toggleDeleteButton() {
  var table = document.getElementById("templateTable");
  var checkboxes = document.querySelectorAll("input[type='checkbox']");
  var deleteButton = document.getElementById("deleteButton");
  var checkedCount = 0;

  for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
          checkedCount++;
      }
  }

  if (checkedCount > 0) {
      deleteButton.style.display = "block";
      deleteButton.addEventListener("click", function () {
          var checkedIds = [];

          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].checked) {
                  var row = checkboxes[i].parentNode.parentNode;
                  var id = row.querySelector(".hidden_id").textContent;
                  checkedIds.push(id);
                  table.deleteRow(row.rowIndex);
              }
          }



          if (checkedIds.length > 0) {
              // Create a new XMLHttpRequest object
              var xhr = new XMLHttpRequest();

              // Define the URL to send the request to
              var url = "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/delParentItem";

              // Define the request method (GET or POST)
              var method = "POST";

              // Define the request parameters
              var params = "ids=" + JSON.stringify(checkedIds);
              console.log(params);

              // Open the request and set the method and URL
              xhr.open(method, url);

              // Set the request headers (if needed)
              xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

              // Define the function to handle the response from the server
              xhr.onreadystatechange = function () {
                  if (xhr.readyState === 4 && xhr.status === 200) {
                      // Handle the response from the server (if needed)
                      console.log(xhr.responseText);
                      // table.innerHTML = xhr.responseText;
                  }
              };

              // Send the request with the parameters
              xhr.send(params);
          }

          deleteButton.style.display = "none";
      });
  } else {
      deleteButton.style.display = "none";
  }
}

// validation 
//validate functions
function setSmallNull() {
  var smallTags = document.querySelectorAll('small');
  for (var i = 0; i < smallTags.length; i++) {
      smallTags[i].innerHTML = null;
  }
}
function showError(input, message) {
  errocheckflag++;
  input.classList.add("erroInput");
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  small.innerText = message;

}

function showSuccess(input) {
  input.classList.remove("erroInput");
}

function checkRequired(inputArr) {
  inputArr.forEach(function (input) {
      if (input.value.trim() === '') {

          showError(input, `${getFieldName(input)} is required`);
      }
      if (input == Input) {
          if (!/^[a-zA-Z\s]+$/.test(Input.value)) {
              showError(Input, `only letters and spaces`);
          }
      }
    
      else {
          showSuccess(input);
      }
  });
}
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
document.getElementById("update").addEventListener('click', ajax_updateItem);
function ajax_updateItem(e) {
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formItemDetails = document.getElementById("popup-form1");

    checkRequired([Input, description,Status]);
    console.log(errocheckflag);

    if (errocheckflag == 0) {
        const form = new FormData(formItemDetails);
        form.append("action", "updateParentItem");
        
        const xhr = new XMLHttpRequest();
        console.log(xhr);
        xhr.open("POST", "" + ROOT + "/Moderator/Itemtemplate/");

        xhr.onload = function () {
            if (xhr.status == 200) {
                const res = xhr.responseText;
                console.log(res);
            }
        }
        xhr.send(form);
        closeModal('update-item');
    }

}









