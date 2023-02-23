
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
var dropdown = document.getElementById("status");

dropdown.addEventListener("change", function() {
  
  var selectedValue = dropdown.value;
  console.log(selectedValue);

  
  var table = document.getElementById("templateTable");
  var rows = table.getElementsByTagName("tr");
  console.log(rows);
  // var column = document.getElementById("status");
  // var cells = table.getElementsByTagName("td[3]");
  // console.log(cells);
  for (var i = 0; i < rows.length; i++) {
    const rowData = [];
     var row = rows[i+1];
     console.log(row);
   
    const cellData = row.cells[3].textContent;
   
    console.log(cellData);
     if (cellData == selectedValue[0].toUpperCase()+selectedValue.slice(1)) {
   
      row.style.display = "";
       console.log(row);

  
  }
  else if(selectedValue==="Status"){
   row.style.display = "";
  }
}
});

//category filter
var dropdownCategory = document.getElementById("category");

// add an event listener to the input element in the table column
dropdownCategory.querySelector("input").addEventListener("input", function() {
  // get the user input value
  var inputValue = this.value;
  var dropdown = dropdownCategory.querySelector("select");

  var optionExists = Array.from(dropdown.options).some(function(option) {
    return option.value === inputValue;
  });
  if (!optionExists) {
    var newOption = document.createElement("option");
    newOption.value = inputValue;
    newOption.textContent = inputValue;
    dropdown.appendChild(newOption);
  }
});






  

