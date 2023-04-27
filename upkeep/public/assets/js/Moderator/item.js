//validataion checking flag
var errocheckflag = 0;

const form1 = document.querySelector('#popup-form1');
const form2 = document.querySelector('#popup-form2');
const input1 = document.querySelector('#itemtemplate_name');
const input2 = document.querySelector('#Itemtemplate_name');
const inputs1 = document.querySelector('#name1');
const inputs2 = document.querySelector('#name2');
const statu1 = document.querySelector('#status');
const statu2 = document.querySelector('#Status');
const description1 = document.querySelector('#description');
const description2 = document.querySelector('#Description');



form2.addEventListener('submit', function (event) {

    event.preventDefault();
    const stat2 = statu2.value;
    const descrip2 = description2.value;
    const temp_name2 = input2.value;

    if (!/^[a-zA-Z\s]+$/.test(temp_name2)) {
        alert('Please enter only letters and spaces.');
        return;
    }
    if (stat2 === "") {
        alert('Please select the status');
        return;
    }

    if (descrip2.trim() === '') {
        alert('please enter description');
        return;
    }
    form2.submit();
});
//new item template addtion popup view
const modal = document.querySelector(".popupview1");
const overlay = document.querySelector(".overlayview");
const btnShowRow1 = document.querySelector(".subcategory");

const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
};

const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");

};
btnShowRow1.addEventListener("click", showModal);
overlay.addEventListener("click", closeModal);

//update itemtemplate popup view
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
//get the itemtemplalte_id of edit item
btnShowRows.forEach(function (button) {
    button.addEventListener('click', function () {

        var row = button.closest('tr');

        // Get the row ID
        var rowId = row.id;

        // Get the values from the row
        var cell1 = row.getElementsByTagName("td")[1].innerHTML;
        console.log(cell1);
        // ... repeat for other cells in the row

        // Set the values in the popup form
        document.getElementById("rowid-input").value = cell1;
        const xhr = new XMLHttpRequest();
        console.log("" + ROOT + "/Moderator/Itemtemplate/editItemtemplate/" + cell1)
        xhr.open('GET', "" + ROOT + "/Moderator/Itemtemplate/editItemtemplate/" + cell1)
        console.log(xhr);
        xhr.onload = function () {
            if (xhr.status == 200) {
                const res = xhr.responseText;
                console.log(res);
                const json = JSON.parse(res);
                // itemtemplateDetails = JSON.parse(res);

                console.log(json.description)

                for (var i = 0; i < json.length; i++) {
                    console.log(json.length);

                    form2.querySelector("#Itemtemplate_name").value = json[0].itemtemplate_name;
                    form2.querySelector("#Status").value = json[0].status;
                    // form2.querySelector("#").value=json.itemtemplate_name;
                    // form2.querySelector("#").value=json.itemtemplate_name;
                    form2.querySelector("#Description").value = json[0].description;
                }
            }
        }

        xhr.send();
    });
});

for (let i = 0; i < btnShowRows.length; i++) {

    btnShowRows[i].addEventListener("click", showModals);
}


overlay.addEventListener("click", closeModals);

const districtSelect = document.getElementById("status");
const district = ['Approved', 'Pending'];

(function populateDistrict() {
    for (let i = 0; i < district.length; i++) {
        const option = document.createElement('option');
        option.textContent = district[i];
        districtSelect.appendChild(option);

    }
    districtSelect.value = 'Select the status';
})();
const districtSelects = document.getElementById("Status");

const districts = ['Approved', 'Pending'];

(function populateDistrict() {
    for (let i = 0; i < districts.length; i++) {
        const option = document.createElement('option');
        option.textContent = districts[i];

        districtSelects.appendChild(option);
    }
    districtSelects.value = 'Select the status';
})();
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


                // Send the checkedIds array to the server using AJAX to delete the corresponding records
                // Alternatively, you can submit a form with hidden inputs to pass the checkedIds array to the server using POST method
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
        else if (!/^[a-zA-Z\s]+$/.test(input1.value)) {
            showError(input1, `only letters and spaces`);
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
        closeModal();
    }

}

//update itemtemplate form submission
document.getElementById("update").addEventListener('click', ajax_updateItem);
function ajax_updateItem(e) {
    errocheckflag = 0;
    e.preventDefault();
    setSmallNull();
    const formItemDetails = document.getElementById("popup-form2");

    checkRequired([input2, description2, statu2]);

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
        closeModal();
    }

}

