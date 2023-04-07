// "use strict";

// Get all DOM and store in variable
// const modal = document.querySelector(".popupview");
// const overlay = document.querySelector(".overlayview");
// const btnCloseModal = document.querySelector(".closebtn");
// const btnShowRow1 = document.querySelector(".card-1");
// const btnShowRow2 = document.querySelector(".card-2");
// const btnShowRow3 = document.querySelector(".card-3");
// const btnShowRow4 = document.querySelector(".card-4");



// Show Modal function const showModal



// show modal click event
// btnShowRow1.addEventListener("click", showModal);
// btnShowRow2.addEventListener("click", showModal);
// btnShowRow3.addEventListener("click", showModal);
// btnShowRow4.addEventListener("click", showModal);





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
 function toggleDeleteButton() {
    // var checkbox = document.getElementById("myCheckbox");
    var checkboxes = document.querySelectorAll("input[type='checkbox']");
    var deleteButton = document.getElementById("deleteButton");
    var showButton = false;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            showButton = true;
            break;
        }
    }
    if (showButton) {
        deleteButton.style.display = "block";
        console.log("show");
    } else {
        deleteButton.style.display = "none";
        console.log("no");
    }
}

// document.addEventListener("DOMContentLoaded",function(){
//     ajax_getItems();
//   });
//   function ajax_getItems(){
//     const xhr = new XMLHttpRequest();
//   xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Item/viewItem","true");
  
//       xhr.onload = function(){
//           if(xhr.status == 200){  
//               const res = xhr.responseText;
//               //  const json = JSON.parse(res);
//               // console.log(json);
//               // try {
//                 const json = JSON.parse(res);
//                 itemtemplateDetails = JSON.parse(res);
//                 console.log(json);
//             // }
//             // catch (error) {
//                 // console.log('Error parsing JSON:', error, res);
//             // }
//               var html = "";
              
//               for (var i = 0; i < json.length; i++) {

//                 console.log(json.length);
//                   // html += "<tbody>";
//                   html += "<tr>";
//                   html += "<td><input type='checkbox' name='id' class='item_id' id='myCheckbox' onchange='toggleDeleteButton()'></td>";

//                   html += "                <td role='button'>";
//                   html += "                    <a href='http://localhost/upkeep/upkeep/public/Moderator/Maintenance'>"+json[i].category+"</a></td>";
//                //   html += "<img src='http://localhost/upkeep/upkeep/public/assets/images/uploads/" + json[i].image + "'>";
//                 //    console.log(json[i].id);
                
//                   html += "                     <td>"+json[i].description+"</td>";
          
                  
//                   html += "                     <td>";
//                   // html += "                <td><"+json[i].type_name+"</td>";
//                   html += "     <div class='view'><button><span class='material-icons-sharp'>edit</span></button></div>                   ";
                 
//                   html +=  "</td>";
                 
//                   html += "                </tr>";
//                   // var id = json[i].id;
          
//               }
//               document.querySelector(".category").innerHTML = html;
//           }
//       }
//       xhr.send();
     
      
//   }
 
   
    
      
    
    
          
            
       
        
           
            
       
       
  

