ajax_getItems();

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

//  const modal = document.querySelector(".popupview1");
//  const overlay = document.querySelector(".overlayview");
const btnCloseModal1 = document.querySelector(".closebtn1");
const btnCloseModal2 = document.querySelector(".closebtn2");
//  const modals = document.querySelector(".popupview2");
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
      const taskID = btn.parentElement.parentElement.parentElement.querySelector('#task_ID');
      console.log(taskID);
      xhr = new XMLHttpRequest;
      xhr.open('GET', "ROOT/Moderator/Maintenance/editMaintenanceTask")

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



// show modal click event


// // close modal click
// btnCloseModal.addEventListener("click", closeModal);
// overlay.addEventListener("click", closeModal);

btnShowRows.forEach(function(button) {
  button.addEventListener('click', function() {
 
    var row = button.closest('tr');

    // Get the row ID
    var rowId = row.task_ID;

    // Get the values from the row
    var cell1 = row.getElementsByTagName("td")[1].innerHTML;
    console.log(cell1);
    // ... repeat for other cells in the row

    // Set the values in the popup form
    document.getElementById("rowid_input1").value = cell1;
    // Set the values in the popup form
    
  });
});



// for (let i = 0; i < btnShowRows.length; i++) {
 
//    btnShowRows[i].addEventListener("click", showModals);
// }


overlay.addEventListener("click", closeModal);


// document.addEventListener("DOMContentLoaded", function () {
  // });
  
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
          html += " <td>" + json[i].description + "</td>";
          html += " <td>" + json[i].sub_component + "</td>";
          html += " <td>" + json[i].years+ "Y "+ json[i].months+"M "+json[i].weeks+"W </td>";                    
          html += "<td><div><button class='edit-maintenance'><span>edit</span></button></div></td>";
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



