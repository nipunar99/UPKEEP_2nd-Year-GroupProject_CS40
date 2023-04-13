





const modal = document.querySelector(".popupview1");
const overlay = document.querySelector(".overlayview");
const btnShowRow1 = document.querySelector(".subcategory");

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
btnShowRow1.addEventListener("click", showModal);
overlay.addEventListener("click", closeModal);
 
 
const modals = document.querySelector(".popupview2");
const btnShowRows = document.querySelectorAll(".view");
const rowIdInput = document.querySelector('#rowid-input');
const table = document.getElementById('categoryTable');
const rows = table.getElementsByTagName("tr");


const showModals = function () {
    console.log("button clicked");
    modals.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

const closeModals = function () {
    modals.classList.add("hidden");
    overlay.classList.add("hidden");
};

btnShowRows.forEach(function(button) {
    button.addEventListener('click', function() {
   
      var row = button.closest('tr');
  
      // Get the row ID
      var rowId = row.id;
  
      // Get the values from the row
      var cell1 = row.getElementsByTagName("td")[1].innerHTML;
      console.log(cell1);
      // ... repeat for other cells in the row
  
      // Set the values in the popup form
      document.getElementById("rowid-input").value = cell1;
    
    });
  });

 for (let i = 0; i < btnShowRows.length; i++) {
   
     btnShowRows[i].addEventListener("click", showModals);
 }


overlay.addEventListener("click", closeModals);
  
 const districtSelect = document.getElementById("status1");
 const district = ['Approved','Pending'];
 
 (function populateDistrict (){
     for(let i=0; i<district.length; i++){
         const option = document.createElement('option');
         option.textContent = district[i];
         districtSelect.appendChild(option);
        
     }
     districtSelect.value = 'Select the status';
 })();
 const districtSelects = document.getElementById("status2");

 const districts = ['Approved','Pending'];
 
 (function populateDistrict (){
     for(let i=0; i<districts.length; i++){
         const option = document.createElement('option');
         option.textContent = districts[i];
       
         districtSelects.appendChild(option);
     }
     districtSelects.value = 'Select the status';
 })();
//  function toggleDeleteButton() {
//     // var checkbox = document.getElementById("myCheckbox");
//     var table = document.getElementById("categoryTable");
//     var checkboxes = document.querySelectorAll("input[type='checkbox']");
//     var deleteButton = document.getElementById("deleteButton");
//     var showButton = false;
//     for (var i = 0; i < checkboxes.length; i++) {
//         if (checkboxes[i].checked) {
//             var row = checkboxes[i].parentNode.parentNode;
//             table.deleteRow(row.rowIndex);
           
//             break;
//         }
//     }
//     if (showButton) {
//         deleteButton.style.display = "block";
//         console.log("show");
//     } else {
//         deleteButton.style.display = "none";
//         console.log("no");
//     }
// }
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
            // for (var i = checkboxes.length - 1; i >= 0; i--) {
            //     if (checkboxes[i].checked) {
            //         var row = checkboxes[i].parentNode.parentNode;
            //         if (row) {
            //             var id = row.querySelector(".hidden_id").textContent;
            //             checkedIds.push(id);
            //             table.deleteRow(row.rowIndex);
            //         }
            //     }
            // }
            

            if (checkedIds.length > 0) {
                
                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();
                    
                    // Define the URL to send the request to
                    var url = "http://localhost/upkeep/upkeep/public/Moderator/Item/delCategory";
                    
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


