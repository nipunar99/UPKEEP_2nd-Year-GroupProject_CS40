
// const checkStatus = document.getElementById("a").innerHTML;

// console.log(checkStatus);

// if(checkStatus == "Pending")
// {
//     document.getElementById("a").classList.add("danger");
// }
// else
// {
//     document.getElementById("a").classList.add("success");
// }
// // const element = document.getElementById("a");
//   if (element.className == "checkStatus") {
//     element.className = "success";
//   } else {
//     element.className = "danger";
//   }
// const checkStatus = document.getElementById("a");
// checkStatus.addEventListener("click", dosomething)
//  function dosomething(event){
//     console.log(event);
//  }
elements = document.getElementsByTagName("td")
for (var i = elements.length; i--;) {
  if (elements[i].innerHTML === "Pending") {
   //  elements[i].style.color = "red";
   elements[i].classList.add("danger");

  }
  if (elements[i].innerHTML === "Approved") {
   //  elements[i].style.color = "green";  
    elements[i].classList.add("success");  
  }
  
}

// function myFunction1() {
//   document.getElementById("myDropdown").classList.toggle("show");
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }
// function updateSelect() {
  // Get a reference to the table and the dropdown
  // var table = document.getElementById("templateTable");
  // var select = document.getElementById("myDropdown");

  // Clear the current options in the dropdown
  // select.innerHTML = "";

  // Loop through each row in the table (skipping the header row)
  // for (var i = 1; i < table.rows.length; i++) {
    // Get the name and value from the current row
    // var name = table.rows[i].cells[0].innerText;
    // var value = table.rows[i].cells[2].innerText;

    // Create a new option for the dropdown and add it to the select element
    // var option = document.createElement("optgroup");
    // option.value = value;
    // console.log("option");
    //  option.text = name + " (" + value + ")";
//     select.add(option);
//   }
// }
// var table = document.getElementById("templateTable");
// table.addEventListener("input", updateSelect);





  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("txtHint");
    filter = input.value.toUpperCase();
    table = document.getElementById("templateTable");
    tr = table.getElementsByTagName("tr");
    for (i =0; i < tr.length; i++) {
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
// Get unique values for the desired columns

// {2 : ["M", "F"], 3 : ["RnD", "Engineering", "Design"], 4 : [], 5 : []}

// function getUniqueValuesFromColumn() {

//   var unique_col_values_dict = {}

//   allFilters = document.querySelectorAll(".table-filter")
//   allFilters.forEach((filter_i) => {
//       col_index = filter_i.parentElement.getAttribute("col-index");
      // alert(col_index)
      // const rows = document.querySelectorAll("#templateTable > tbody > tr")

      // rows.forEach((row) => {
      //     cell_value = row.querySelector("td:nth-child("+col_index+")").innerHTML;
          // if the col index is already present in the dict
          // if (col_index in unique_col_values_dict) {

              // if the cell value is already present in the array
              // if (unique_col_values_dict[col_index].includes(cell_value)) {
                  // alert(cell_value + " is already present in the array : " + unique_col_values_dict[col_index])

              // } else {
              //     unique_col_values_dict[col_index].push(cell_value)
                  // alert("Array after adding the cell value : " + unique_col_values_dict[col_index])

  //             }


  //         } else {
  //             unique_col_values_dict[col_index] = new Array(cell_value)
  //         }
  //     });

      
  // });

//   for(i in unique_col_values_dict) {
//       alert("Column index : " + i + " has Unique values : \n" + unique_col_values_dict[i]);
//   }

//   updateSelectOptions(unique_col_values_dict)

// };

// Add <option> tags to the desired columns based on the unique values

// function updateSelectOptions(unique_col_values_dict) {
//   allFilters = document.querySelectorAll(".table-filter")

//   allFilters.forEach((filter_i) => {
//       col_index = filter_i.parentElement.getAttribute('col-index')

//       unique_col_values_dict[col_index].forEach((i) => {
//           filter_i.innerHTML = filter_i.innerHTML + `\n<option value="${i}">${i}</option>`
//       });

//   });
// };


// Create filter_rows() function

// filter_value_dict {2 : Value selected, 4:value, 5: value}

// function filter_rows() {
//   allFilters = document.querySelectorAll(".table-filter")
//   var filter_value_dict = {}

//   allFilters.forEach((filter_i) => {
//       col_index = filter_i.parentElement.getAttribute('col-index')

//       value = filter_i.value
//       if (value != "all") {
//           filter_value_dict[col_index] = value;
//       }
//   });

//   var col_cell_value_dict = {};

//   const rows = document.querySelectorAll("#templateTable tbody tr");
//   rows.forEach((row) => {
//       var display_row = true;

//       allFilters.forEach((filter_i) => {
//           col_index = filter_i.parentElement.getAttribute('col-index')
//           col_cell_value_dict[col_index] = row.querySelector("td:nth-child(" + col_index+ ")").innerHTML
//       })

//       for (var col_i in filter_value_dict) {
//           filter_value = filter_value_dict[col_i]
//           row_cell_value = col_cell_value_dict[col_i]
          
//           if (row_cell_value.indexOf(filter_value) == -1 && filter_value != "all") {
//               display_row = false;
//               break;
//           }


//       }

//       if (display_row == true) {
//           row.style.display = "table-row"

//       } else {
//           row.style.display = "none"

//       }





//   })

// }
// const mySelect = document.getElementById("status");
// const myTable = document.getElementById("templateTable");

// mySelect.addEventListener("change", function() {
//   const selectedOption = mySelect.options[mySelect.selectedIndex].text;
//   myTable.rows[1].cells[0].textContent = selectedOption;
// });
// Get a reference to the dropdown element
// var dropdown = document.getElementById("status");

// Add an event listener to the dropdown to listen for changes
// dropdown.addEventListener("change", function() {
  // Get the selected value from the dropdown
  // var selectedValue = dropdown.value;
  // console.log(selectedValue);

  // Loop through all the rows in the table and hide/show them based on the selected value
  // var table = document.getElementById("templateTable");
  // var rows = table.getElementsByTagName("tr");
  // console.log(rows);
  // for (var i = 0; i < rows.length; i++) {
  //   const rowData = [];
  //    var row = rows[i];
  //    console.log(row);
    // var objCells = table.rows.item(i).cells;
  // Loop through each cell in the current row
  // for (let j = 0; j < table.rows[i].cells.length; j++) {
    // Get the data from the current cell
    // const cellData = table.rows[i].cells[3].textContent;
    // rowData.push(cellData);
            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            // for (var j = 0; j < objCells.length; j++) {
            //     console.log( objCells.item(3).innerHTML);
            // }
            // info.innerHTML = info.innerHTML + '<br />'; 
    // var cells = row.getElementsByTagName("td[3]");
    // console.log(cells.innerHTML);
    // console.log(cellData);
    //  if (cellData == selectedValue[0].toUpperCase()+selectedValue.slice(1)) {
    //   // If no option is selected, show all rows
      // table.rows[i].style.display = "";
      //  console.log(row);

    //  } else if(cellData === "Approved"){
    //   // Otherwise, show rows where the cell in the third column matches the selected option
       
    //     row.style.display = "";
    // row.style.display = "none";
    //     console.log(selectedValue);
    //   } else {
    //     row.style.display = "";
    //   }
    // }
//   }
//   else if(selectedValue==="Status"){
//    table.rows[i].style.display = "";
//   }
// }
// });

//status filter
// var dropdown = document.getElementById("status");

// dropdown.addEventListener("change", function() {
  
//   var selectedValue = dropdown.value;
//   console.log(selectedValue);

  
//   var table = document.getElementById("templateTable");
//   var rows = table.getElementsByTagName("tr");
//   console.log(rows);
  // var column = document.getElementById("status");
  // var cells = table.getElementsByTagName("td[3]");
  // console.log(cells);
//   for (var i = 0; i < rows.length; i++) {
//     const rowData = [];
//      var row = rows[i+1];
//      console.log(row);
   
//     const cellData = row.cells[3].textContent;
   
//     console.log(cellData);
//      if (cellData == selectedValue[0].toUpperCase()+selectedValue.slice(1)) {
   
//       row.style.display = "";
//        console.log(row);

  
//   }
//   else if(selectedValue==="Status"){
//    row.style.display = "";
//   }
// }
// });

//category filter
// var dropdownCategory = document.getElementById("category");

// // add an event listener to the input element in the table column
// dropdownCategory.querySelector("input").addEventListener("input", function() {
//   // get the user input value
//   var inputValue = this.value;
//   var dropdown = dropdownCategory.querySelector("select");

//   var optionExists = Array.from(dropdown.options).some(function(option) {
//     return option.value === inputValue;
//   });
//   if (!optionExists) {
//     var newOption = document.createElement("option");
//     newOption.value = inputValue;
//     newOption.textContent = inputValue;
//     dropdown.appendChild(newOption);
//   }
// });
function sortTable(n){
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
     /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
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
      switchcount ++;      
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
// //Ajax for add item details

// document.getElementsByClassName(".button").addEventListener('click',ajax_addItem);

// function ajax_addItem(e){
//     e.preventDefault();

//     const formItemDetails = document.getElementById("form_itemDetails");

//     const form = new FormData(formItemDetails);
//     form.append("action","addItem");
//     // const urlparams = new URLSearchParams(form);

    
//     const xhr = new XMLHttpRequest();

//     xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate");
    // xhr.setRequestHeader("Content-Type","application/json");             
    // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

//     xhr.onload = function(){
//         if(xhr.status == 200){
//             const res = xhr.responseText;
//             console.log(res);
//         }
//     }

//     xhr.send(form);
    
//     // closeModal();
//     ajax_getItems();
//     formItemDetails.reset();
//     // showModal1();

// }
document.getElementsByClassName(".button").addEventListener('click',function(){
  // closeModal1();
  ajax_getItems();
});

document.addEventListener("DOMContentLoaded",function(){
  ajax_getItems();
});

function ajax_getItems(){
  const xhr = new XMLHttpRequest();
xhr.open("POST","http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/completeItemTemplate","true");

    xhr.onload = function(){
        if(xhr.status == 200){  
            const res = xhr.responseText;
            //  const json = JSON.parse(res);
            // console.log(json);
            try {
              const json = JSON.parse(res);
              console.log(json);
          }
          catch (error) {
              console.log('Error parsing JSON:', error, res);
          }
            var html = "";
            
            for (var i = 0; i < json.length; i++) {
                html += "<tbody>";
                html +=               "<tr>";
                html += "                <td class='template_name'>";                                
                html += "                     <div class='image'>";
                html +="<img src='http://localhost/upkeep/upkeep/public/assets/images/uploads'"+json[i].image+">";
                html +="</div>";
                html += "                        <div class='name'>";
                html += ""+json[i].itemtemplate_name+">";
                html += "                    </div>";
                html += "                     </td>";
                html += "                <td><"+json[i].type_name+"></td>        ";
                html += "                        <td class='status'><"+json[i].type_name+"></td>";
                html += "                        <td><"+json[i].description+"></td>";        
                html += "                       <td>";
               html+=" <div class='more'>  ";                         
                html += "<div class='view'><button><a href='http://localhost/upkeep/upkeep/app/Moderator/Item/viewItem/'"+json[i].id+"><span class='material-icons-sharp'>view_list</span></a></button></div>&nbsp;&nbsp;<div class='delete'><button><span class='material-icons-sharp'>delete</span></button></div>";
                html += "                </div>";
                html += "                <td>";
                html += "                <tr>";
                // let tags = JSON.parse(json[i].work_tags);
                // for(var j = 0; j < tags.length; j++) {
                //     html += "<h3>"+tags[j]+"</h3>"
                //     // console.log(tags[j]);
                //}                
                // html +=                 "</div>";
                // html += "                <div class='location'><span class='material-icons-sharp'>location_on</span><h3>"+json[i].location+"</h3></div>";
                // html += "            </div>";
                // html += "            <div class='action-bar'>";
                // html += "                <a href='http://localhost/upkeep/upkeep/public/itemowner/ViewGig/selectGig/"+json[i].gig_id+"' class='view'>View</a>";
                // html += "            </div>";
                // html += "        </div>";
            }
            document.querySelector(".insight").innerHTML = html;
        }
    }
    xhr.send();

}









  

