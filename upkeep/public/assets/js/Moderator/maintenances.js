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

 const modal = document.querySelector(".popupview1");
 const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
 const btnShowRow1 = document.querySelector(".subcategory");
 const modals = document.querySelector(".popupview2");
 const btnShowRows = document.querySelectorAll(".view");
 const rowIdInput = document.querySelector('#rowid_input1');
 const table = document.getElementById('categoryTable');
 const rows = table.getElementsByTagName("tr");

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
const showModals = function () {
  console.log("button clicked");
 
  modals.classList.remove("hidden");
  overlay.classList.remove("hidden");
}; 

const closeModals = function () {
  modals.classList.add("hidden");
  overlay.classList.add("hidden");
};
// show modal click event
btnShowRow1.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

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

for (let i = 0; i < btnShowRows.length; i++) {
 
   btnShowRows[i].addEventListener("click", showModals);
}


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
          html += "<td><input type='checkbox' name='task_ID[]' class='item_id' id='myCheckbox' onchange='toggleDeleteButton()'></td>";
          html+= "<td class='hidden_id'>" + json[i].task_ID + "</td>";
          html += " <td>" + json[i].description + "</td>";
          html +=" <td>" + json[i].sub_component + "</td>";
          html += "                     <td>";
          html += "" + json[i].years+ "Y "+ json[i].months+"M "+json[i].weeks+"W ";
         
          html += "</td>";
                                
          html += " <td><div><button class='view'><span class='material-icons-sharp'>edit</span></button></div>";
          html += "                </td>";
          html += "                </tr>";
         
  
        }
        document.querySelector(".category").innerHTML = html;
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
                
                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();
                    
                    // Define the URL to send the request to
                    var url = "http://localhost/upkeep/upkeep/public/Moderator/Maintenance/delMaintenance";
                    
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
                // Alternatively, you can submit a form with hidden inputs to pass the checkedIds array to the server using POST method
            }

            deleteButton.style.display = "none";
        });
    } else {
        deleteButton.style.display = "none";
    }
}



