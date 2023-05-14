
//validataion checking flag
var errocheckflag = 0;

const form1 = document.querySelector('#popup-form1');
const form2 = document.querySelector('#popup-form2');
const input1 = document.querySelector('#itemtemplate_name');
const input2 = document.querySelector('#Itemtemplate_name');
const inputs1 = document.querySelector('#name1');
const inputs2 = document.querySelector('#name2');
const statu1 = document.querySelector('#status1');
const statu2 = document.querySelector('#Status');
const description1 = document.querySelector('#description');
const description2 = document.querySelector('#Description');

const districtSelect = document.getElementById("status1");

const district = ['Approved', 'Pending'];

(function populateDistrict() {
    for (let i = 0; i < district.length; i++) {
        const option = document.createElement('option');
        option.textContent = district[i];
        districtSelect.appendChild(option);
    }

    // Set the default value of the select element
    districtSelect.value = 'Select the status';
})();

//new item template addtion popup view
const popupviews = document.getElementsByClassName("popupview");
const overlay = document.querySelector(".overlayview");
const btnShowRow1 = document.querySelector(".subcategory");
const btnCloseModal1 = document.querySelector(".closebtn1");
const btnCloseModal2 = document.querySelector(".closebtn2");


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

btnShowRow1.addEventListener("click", function (e) {
    e.preventDefault();
    showModal("add-item");
});
btnCloseModal1.addEventListener("click", function (e) {
    e.preventDefault();
    closeModal("add-item");

});
btnCloseModal2.addEventListener("click", function (e) {
    e.preventDefault();
    closeModal("update-item");
});

const table = document.getElementById('categoryTable');
const rows = table.getElementsByTagName("tr");

function setEventListner() {
    const btnShowRows = document.querySelectorAll(".view");
    btnShowRows.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            console.log('click');
            showModal('update-item');
            var row = button.closest('tr');

            // Get the row ID
            var rowId = row.id;

            // Get the values from the row
            var cell1 = row.getElementsByTagName("td")[1].innerHTML;
            console.log(cell1);

            const xhr = new XMLHttpRequest();
            xhr.open('GET', "" + ROOT + "/Moderator/Itemtemplate/editItemtemplate/" + cell1);
            // console.log(xhr);
            xhr.onload = function () {
                if (xhr.status == 200) {
                    const res = xhr.responseText;
                    // console.log(res);
                    const json = JSON.parse(res);
                    console.log(json);

                    for (var i = 0; i < json.length; i++) {
                        console.log(json.length);

                        form2.querySelector("#Itemtemplate_name").value = json[0].itemtemplate_name;
                        form2.querySelector("#Status").value = json[0].status;
                        form2.querySelector("#Description").value = json[0].description;
                        // form2.querySelector("#Upfile").value = json[0].image;
                    }
                }
            }
            console.log();
            xhr.send();

        })
    });
}
const btn = document.querySelector(".view-1-button");
btn.addEventListener('click',function(){
    ajax_addMaintenances();
})
function ajax_addMaintenances(){
    const xhr = new XMLHttpRequest();
    xhr.open("POST","" + ROOT + "/Moderator/Itemtemplate/parentMaintenances", "true");
    console.log(xhr);
    
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

document.addEventListener("DOMContentLoaded", function () {
    ajax_getItems();
    ajax_statisticView();
});

function ajax_getItems() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/viewChildItem", "true");
    // console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            itemtemplateDetails = JSON.parse(res);
            var html = "";
            console.log(itemtemplateDetails);

            for (var i = 0; i < json.length; i++) {
                console.log(json.length);

                html += "<tr>";
                html += "<td><input type='checkbox' name='id[]' class='item_id' id='myCheckbox' onchange='toggleDeleteButton()'></td>";
                html += "<td class='hidden_id'>" + json[i].id + "</td>";

                html += "<td role='button'><a href='http://localhost/upkeep/upkeep/public/Moderator/Maintenance/maintenanceTasks/" + json[i].id + "'>" + json[i].itemtemplate_name + " </a>";

                html += "</td>";
                html += "<td id='status'" ;
                if (json[i].status == 'Approved') {
                    html += "class='succes'>";
                  } else {
          
                    html += "class = 'dange'>";
                  }
                html += "" + json[i].status + "";
                html += "</td>";
                html += "<td class='des'>" + json[i].description + "</td>";
                html += "<td>";
                html += "<div><button class='view'><span>edit</span></button></div>";
                html += "</td>";
                html += "</tr>";


            }
            document.querySelector(".category").innerHTML = html;
            setEventListner();
        }
    }
    xhr.send();


}


var totalUsers, itemUsers;
function ajax_statisticView() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "" + ROOT + "/Moderator/Itemtemplate/statisticView", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            totalUsers = json.total_users;
            itemUsers = json.item_users;
            var html = "";



            html += "<div class='text'>";
            html += "<div class='text-1'>";
            html += "<h2>Item Users</h2></div>";
            html += "<div class='text-2'>";
            // html += "<div class='t1'><h4>Total Users <h3>" + json.total_users + "</h3></h4></div>";
            // html += "<div class='t2'><h4>Item Users <h3>" + json.item_users + "</h3></h4></div>";
            html += " </div></div>";


            console.log(totalUsers, itemUsers);
            document.querySelector(".text").innerHTML = html;
            console.log(totalUsers, itemUsers);
            const ctx = document.getElementById('pieChart');
            const data = {

                datasets: [{
                    data: [totalUsers, itemUsers],
                    backgroundColor: [
                        'lightgreen',
                        '#B3B4BB;'

                    ],
                    hoverOffset: 4
                }],
                labels: [
                    'Total Users',
                    'Item Users',

                ]
            };


            new Chart(ctx, {
                type: 'doughnut',
                data: data,
            })
        }

    }
    xhr.send();


}
//delete itemtemplate
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
                console.log("a");
                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Define the URL to send the request to
                var url = "http://localhost/upkeep/upkeep/public/Moderator/Itemtemplate/delChildItem";

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
        if (input == input1) {
            if (!/^[a-zA-Z\s]+$/.test(input1.value)) {
                showError(input1, `only letters and spaces`);
            }
        }
        else if (input == input2) {
            if (!/^[a-zA-Z\s]+$/.test(input2.value)) {
                showError(input1, `only letters and spaces`);
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

//new itemtemplate form submission
document.getElementById("add").addEventListener('click', ajax_addItem);
function ajax_addItem(e) {
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formItemDetails = document.getElementById("popup-form1");

    checkRequired([input1, description1, statu1]);
    console.log(input1.value.trim());
    if (errocheckflag == 0) {
        const form = new FormData(formItemDetails);
        form.append("action", "addItem");

        // form.delete('alter_type');
        // const urlparams = new URLSearchParams(form);

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "" + ROOT + "/Moderator/Itemtemplate/");
        // xhr.setRequestHeader("Content-Type","application/json");             
        // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status == 200) {
                const res = xhr.responseText;
                console.log(res);
            }
        }

        xhr.send(form);
        closeModal('add-item');
    }

}
//update itemtemplate form submission
document.getElementById("update").addEventListener('click', ajax_updateItem);
function ajax_updateItem(e) {
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formItemDetails = document.getElementById("popup-form2");

    checkRequired([input2, description2]);
    console.log(errocheckflag);
    console.log(input2.value.trim());
    console.log(errocheckflag);
    if (errocheckflag == 0) {
        const form = new FormData(formItemDetails);
        form.append("action", "updateItem");
        // form.append("id",cell1);
        // form.delete('alter_type');
        // const urlparams = new URLSearchParams(form);
        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "" + ROOT + "/Moderator/Itemtemplate/");
        console.log(xhr);
        // xhr.setRequestHeader("Content-Type","application/json");             
        // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

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

