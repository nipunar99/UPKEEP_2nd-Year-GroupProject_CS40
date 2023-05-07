const url = window.location.href;
const taskId = url.substring(url.lastIndexOf("/") + 1);
console.log(taskId);

document.addEventListener("DOMContentLoaded", function () {
    ajax_getItems();
    ajax_getSuggestionItemDetails();
});

const modal = document.getElementsByClassName("popupview");
const overlay = document.querySelector(".overlayview");
const btnCloseModal1 = document.querySelector(".closebtn1");
const btnCloseModal2 = document.querySelector(".closebtn2");
const btnShowRow1 = document.querySelector(".approve");
const btnShowRow2 = document.querySelector(".delete");
var errocheckflag = 0;


const form2 = document.getElementById("popup-form2");
const input2 = document.querySelector('#Sub_component');
const input1 = document.querySelector('#sub_component');
const year1 = document.querySelector('#years');
const month1 = document.querySelector('#months');
const week1 = document.querySelector('#weeks')
const year2 = document.querySelector('#Years');
const month2 = document.querySelector('#Months');
const week2 = document.querySelector('#Weeks');
const statu1 = document.querySelector('#status');
const statu2 = document.querySelector('#Status');
const description1 = document.querySelector('#description');
const description2 = document.querySelector('#Description');


// Show Modal function const showModal
const showModal = function (id) {
    console.log("button clicked");
    modal[id].classList.remove("hidden");
    overlay.classList.remove("hidden");
};

// Close Modal function
const closeModal = function (id) {
    modal[id].classList.add("hidden");
    overlay.classList.add("hidden");
};


btnShowRow1.addEventListener('click', function (e) {
    e.preventDefault();
    showModal("approve-btn");
}
);
btnShowRow2.addEventListener('click', function (e) {
    e.preventDefault();
    showModal("cancel-btn");
}
);
btnCloseModal1.addEventListener("click", function (e) {
    e.preventDefault();
    closeModal("approve-btn");
});
btnCloseModal2.addEventListener("click", function (e) {
    e.preventDefault();
    closeModal("cancel-btn");
});
overlay.addEventListener("click", function (e) {
    e.preventDefault();
    closeModal("cancel-btn");
    closeModal("approve-btn");
});

function ajax_getSuggestionItemDetails() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "" + ROOT + "/Moderator/Suggestion/viewItemSuggestions/" + taskId);
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html = "";
            console.log(json);
            for (var i = 0; i < json.length; i++) {
                console.log(length);

                html += "<div class='view-1'><div class='img'><img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/"+json[i].image+"'> </div> </div>";
                html += " <div class='view-2'><div class='view-1-text'><h1>Suggested Item</h1>";
                html += "<div class='name'><h3>Template Name</h3> <h3>"+json[i].item_name+"</h3></div>";
                html += " <div class='type'> <h3>Item Type</h3> <h3>"+json[i].item_type+"</h3></div> ";
                html += " <div class='date'> <h3>Added Date</h3> <h3>"+json[i].purchase_date+"</h3></div> ";
                html += " <div class='brand'> <h3>Brand</h3> <h3>"+json[i].brand+"</h3></div> ";
                html += " <div class='description'> <h3>Description</h3> <h3>"+json[i].description+"</h3></div></div></div>";
                // html += "<div class='view-1-button'><button><div class='approve'>Approve</div></button><button><div class='delete'>Delete</div></button></div></div>";
               
            }
            document.querySelector(".view-details").innerHTML = html;
        }
    }
    xhr.send();
}
function setEventListner(){
    const action_update = document.querySelectorAll(".edit-maintenance");
    console.log(action_update);
    action_update.forEach(function(btn){
      btn.addEventListener('click', function(e){
        e.preventDefault();
        console.log('click');
        showModal('update-maintenance');
        var row = btn.closest('tr');
  
        // Get the row ID
        var rowId = row.id;
  
        // Get the values from the row
        var taskID = row.getElementsByTagName("td")[1].innerHTML;
        console.log(taskID);
        // ... repeat for other cells in the row
  
        // Set the values in the popup form
        document.getElementById("rowid-input").value = taskID;
        console.log(taskID);
        xhr = new XMLHttpRequest();
        xhr.open('GET', "" + ROOT + "/Moderator/Maintenance/editMaintenanceTask/"+ taskID);
        console.log(xhr);
        xhr.onload = function () {
          if (xhr.status == 200) {
              const res = xhr.responseText;
              // console.log(res);
              const json = JSON.parse(res);
  
              for (var i = 0; i < json.length; i++) {
                  console.log(json.length);
  
                  form2.querySelector("#Sub_component").value = json[0].sub_component;
                  form2.querySelector("#Status").value = json[0].status;
                  form2.querySelector("#Years").value=json[0].years;
                  form2.querySelector("#Months").value=json[0].months;
                  form2.querySelector("#Description").value = json[0].description;
                  form2.querySelector("#Weeks").value = json[0].weeks;
              }
          }
      }
  
      xhr.send();
      })
    });
  }
  function ajax_getItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Suggestion/viewMaintenanceTasks", "true");
  console.log(xhr);
    xhr.onload = function () {
      if (xhr.status == 200) {
        const res = xhr.responseText;
       
        const json = JSON.parse(res);
        console.log(json);
        var html = "";
  
        for (var i = 0; i < json.length; i++) {
          console.log(json.length);
       
          html += "<tr>";
          html += " <td><input type='checkbox' name='task_ID[]' class='item_id' id='myCheckbox' onchange='toggleDeleteButton()'></td>";
          html += " <td class='hidden_id' id='task_ID'>" + json[i].task_ID + "</td>";        
          html += " <td id='subcomponent'>" + json[i].sub_component + "</td>";
          html += " <td id='C_description'>" + json[i].description + "</td>";
          html += " <td id='time_frame'>" + json[i].years+ "Y "+ json[i].months+"M "+json[i].weeks+"W </td>";                    
          html += "<td><div  class='btn-container'><button class='edit-maintenance'><span>edit</span></button></div></td>";
          html += "</tr>";
        }
        document.querySelector(".maintenances_suggestions").innerHTML = html;
        setEventListner();
      }
    }
    xhr.send();
  }

  
  
  
  
  
    
  function toggleDeleteButton() {
    var table = document.getElementById("categoryTable");
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
        deleteButton.addEventListener("click", function() {
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
                
                    var xhr = new XMLHttpRequest();
                  
                    var url = "http://localhost/upkeep/upkeep/public/Moderator/Maintenance/delMaintenance";
                    
                    var method = "POST";
                   
                    var params = "ids=" + JSON.stringify(checkedIds);
                    console.log(params);
                    
                    xhr.open(method, url);
                   
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    
                    // Define the function to handle the response from the server
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response from the server (if needed)
                        console.log(xhr.responseText);
                        // table.innerHTML = xhr.responseText;
                      }
                    };
                    
                    // Send the request with the parameters
                    xhr.send(params);
                  
                  
                // Send the checkedIds array to the server using AJAX to delete the corresponding records
                
            }

            deleteButton.style.display = "none";
        });
    } else {
        deleteButton.style.display = "none";
    }
}

// validation 

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
      // else if (!/^[a-zA-Z\s]+$/.test(input1.value) ) {
      //     showError(input1, `only letters and spaces`);
      // }
      else {
          showSuccess(input);
      }
  });
}
function checkRange(input, min, max) {
  if (parseFloat(input.value) < min) {
    showError(input, `${getFieldName(input)} must be at least ${min}`);
  } else if (parseFloat(input.value) > max) {
    showError(input, `${getFieldName(input)} must be less than ${max} characters`);
  } else {
    showSuccess(input);
  }
}
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//new itemtemplate form submission
document.getElementById("addMaintenancebtn").addEventListener('click', ajax_addMaintenanceTask);
function ajax_addMaintenanceTask(e) {
  errocheckflag = 0;
  e.preventDefault();
  setSmallNull();
  const formItemDetails = document.getElementById("popup-form1");

    checkRequired([input1, description1, statu1]);
  checkRange(year1, 1, 10);
  checkRange(month1, 1, 11);
  checkRange(week1, 1, 3);

  if (errocheckflag == 0) {
      const form = new FormData(formItemDetails);
      form.append("action", "addMaintenanceTask");
      form.append("item_template_id",taskId);

      // form.delete('alter_type');
      // const urlparams = new URLSearchParams(form);

      console.log(form);
      const xhr = new XMLHttpRequest();

      xhr.open("POST", "" + ROOT + "/Moderator/Maintenance/");
      // xhr.setRequestHeader("Content-Type","application/json");             
      // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

      xhr.onload = function () {
          if (xhr.status == 200) {
              const res = xhr.responseText;
               console.log(res);
          }
      }

      xhr.send(form);
      closeModal("add-maintenance");
  }

}

//update maintenance task

//new itemtemplate form submission
document.getElementById("updateMaintenancebtn").addEventListener('click', ajax_updateMaintenanceTask);
function ajax_updateMaintenanceTask(e) {
  errocheckflag = 0;
  e.preventDefault();
  setSmallNull();
  const formItemDetailss = document.getElementById("popup-form2");

  checkRequired([input2, description2, statu2]);
  // checkRange(year2, 1, 10);
  // checkRange(month2, 1, 11);
  // checkRange(week2, 1, 3);

  if (errocheckflag == 0) {
      const form = new FormData(formItemDetailss);
      form.append("action", "updateMaintenanceTask");
      form.append("item_template_id",taskId);

      console.log(form);
      const xhr = new XMLHttpRequest();

      xhr.open("POST", "" + ROOT + "/Moderator/Maintenance/");
    
      xhr.onload = function () {
          if (xhr.status == 200) {
              const res = xhr.responseText;
              console.log(res);
          }
      }

      xhr.send(form);
      closeModal("update-maintenance");
  }

}
// document.addEventListener('DOMContentLoaded', function() {
 var add_btn = document.querySelector(".add-btn");
 var reject_btn = document.querySelector(".reject-btn");
 var yes_btn = document.querySelector(".yes-btn");
 var no_btn = document.querySelector(".no-btn");
 add_btn.addEventListener("click",ajax_approveItem);
 console.log('click');
 function ajax_approveItem(){
  
  const xhr = new XMLHttpRequest();

  xhr.open('GET',""+ROOT+"/Moderator/Suggestion/approveItemSuggestion/"+taskId);
  xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          console.log(res);
      }
  }
  xhr.send();

  closeModal("approve-btn");

 }
// });
