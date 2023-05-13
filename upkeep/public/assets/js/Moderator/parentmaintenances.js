var errocheckflag = 0;

const form2 = document.getElementById("popup-form2");
const input1 = document.querySelector('#sub_component');
const input2 = document.querySelector('#Sub_component');
const year1 = document.querySelector('#years');
const month1 = document.querySelector('#months');
const week1 = document.querySelector('#weeks');
const year2 = document.querySelector('#Years');
const month2 = document.querySelector('#Months');
const week2 = document.querySelector('#Weeks');
const statu1 = document.querySelector('#status');
const statu2 = document.querySelector('#Status');
const description1 = document.querySelector('#description');
const description2 = document.querySelector('#Description');
const districtSelect = document.getElementById("status");
const district = ['Approved','Pending'];

(function populateDistrict (){
    for(let i=0; i<district.length; i++){
        const option = document.createElement('option');
        option.textContent = district[i];
        districtSelect.appendChild(option);
    }
    districtSelect.value = 'Select the status';
})();
const DistrictSelect = document.getElementById("Status");

const District = ['Approved','Pending'];

(function populateDistrict (){
    for(let i=0; i<District.length; i++){
        const option = document.createElement('option');
        option.textContent = District[i];
        DistrictSelect.appendChild(option);
    }
    DistrictSelect.value = 'Select the status';
})();

const btnCloseModal1 = document.querySelector(".closebtn1");
const btnCloseModal2 = document.querySelector(".closebtn2");
 const btnShowRows = document.querySelectorAll(".edit-maintenance");
 const rowIdInput = document.querySelector('#rowid_input1');
 const table = document.getElementById('categoryTable');
 const rows = table.getElementsByTagName("tr");


const popupviews = document.getElementsByClassName("popupview");
const overlay = document.getElementById('overlay');
const btnShowRow1 = document.querySelector(".subcategory");

//Event Listners
btnShowRow1.addEventListener("click", function(e){
  e.preventDefault();
  showModal("add-maintenance");
});
btnCloseModal1.addEventListener("click", function(e){
  e.preventDefault();
  closeModal("add-maintenance");
  closeModal("update-maintenance");
});
btnCloseModal2.addEventListener("click", function(e){
  e.preventDefault();
  closeModal("update-maintenance");
});

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




// Show Modal function const showModal
const showModal = function (id) {
    console.log("button clicked");
    popupviews[id].classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function (id) {
  console.log("button clicked");
    popupviews[id].classList.add("hidden");
    overlay.classList.add("hidden");
};


overlay.addEventListener("click", closeModal);


document.addEventListener("DOMContentLoaded", function () {
       ajax_getItems();
  });
  
  function ajax_getItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Maintenance/viewMaintenanceTasks", "true");
  
    xhr.onload = function () {
      if (xhr.status == 200) {
        const res = xhr.responseText;
       
        const json = JSON.parse(res);
        itemtemplateDetails = JSON.parse(res);
        
        var html = "";
  
        for (var i = 0; i < json.length; i++) {
          console.log(json.length);
       
          html += "<tr>";
          html += " <td><input type='checkbox' name='task_ID[]' class='item_id' id='myCheckbox' onchange='toggleDeleteButton()'></td>";
          html += " <td class='hidden_id' id='task_ID'>" + json[i].task_ID + "</td>";
          html += " <td id='subcomponent'>" + json[i].sub_component + "</td>";
          html += " <td id='C_description'>" + json[i].description + "</td>";
          var duration_weeks = "";
          var duration_months = "";
          var duration_years = "";
          
          if (json[i].weeks > 0) {
            duration_weeks = json[i].weeks + " weeks ";
          }
          if (json[i].months > 0) {
            duration_months = json[i].months + " months ";
          }
          if (json[i].years > 0) {
            duration_years = json[i].years + " years ";
          }  
          var duration = duration_weeks + duration_months + duration_years;

          if (duration.trim() !== "") {
            html += "<td id='time_frame'>" + duration + "</td>";
          } else {
            html += "<td id='time_frame'>N/A</td>";
          }                   
          html += "<td><div class='btn-container'><button class='edit-maintenance'><span>edit</span></button></div></td>";
          html += "</tr>";
         
  
        }
        document.querySelector(".category").innerHTML = html;
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
                    
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                      
                      }
                    };
               
                    xhr.send(params);
               
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
const url = window.location.href;
const taskId = url.substring(url.lastIndexOf("/") + 1);
console.log(taskId);
//new itemtemplate form submission
document.getElementById("addMaintenancebtn").addEventListener('click', ajax_addMaintenanceTask);
function ajax_addMaintenanceTask(e) {
  errocheckflag = 0;
  e.preventDefault();
  setSmallNull();
  const formItemDetails = document.getElementById("popup-form1");

  checkRequired([description1, statu1]);
  checkRange(year1, 0, 10);
  checkRange(month1, 0, 11);
  checkRange(week1, 0, 3);

  if (errocheckflag == 0) {
      const form = new FormData(formItemDetails);
      form.append("action", "addMaintenanceTask");
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
  checkRange(year2, 0, 10);
  checkRange(month2, 0, 11);
  checkRange(week2, 0, 3);

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


