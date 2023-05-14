const imagesInput = document.getElementById('images_input');
const imagesPreview = document.getElementById('preview');
const list = document.createElement('ol');
imagesPreview.appendChild(list);
const Files=[];



imagesInput.addEventListener('change', updateImageDisplay);


function updateImageDisplay() {
    const curFiles = imagesInput.files;
    if (curFiles.length ==5) {
        alert("You can't upload more than 5 images");
        imagesInput.value = "";
        return;
    } else {
        for (const file of curFiles) {
            if (validFileType(file)) {
                const listItem = document.createElement('li');
                const para = document.createElement('p');

                //add remove button
                const removeBtn = document.createElement('button');
                removeBtn.classList.add('remove-btn');
                removeBtn.innerHTML = "X";
                removeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    listItem.remove();
                    Files.splice(Files.indexOf(file), 1);
                    imagesInput.value = "";
                    console.log(Files);
                });
                listItem.appendChild(removeBtn);
                const image = document.createElement('img');
                image.src = URL.createObjectURL(file);
                Files.push(file);
                listItem.appendChild(image);
                list.appendChild(listItem);
            } else {
                imagesInput.value = "";
                showErrors(imagesInput,'Invalid file type');
                setTimeout(()=>{
                    clearErrorsInput(imagesInput);
                },3000);
            }

        }
    }
}


const fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
];

function validFileType(file) {
    return fileTypes.includes(file.type);
}

function returnFileSize(number) {
    if (number < 1024) {
        return number + 'bytes';
    } else if (number >= 1024 && number < 1048576) {
        return (number / 1024).toFixed(1) + 'KB';
    } else if (number >= 1048576) {
        return (number / 1048576).toFixed(1) + 'MB';
    }
}
//end of image upload handling

//populate distritcs using cities.json and then when user selets a district populate cities using cities.json. cities.json structure is as follows: {"districtname1" : {cities:["city1","city2","city3"]},"districtname2" : {cities:["city1","city2","city3"]}}

// const cities = document.getElementById("city");
const districts = document.getElementById("district");
const cities = document.getElementById("city");

//populate districts
function populateDistricts() {
    // console.log("populateDistricts called");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
    xhr.send();

    xhr.onload = function () {
        if (this.status == 200) {
            const districtsObj = JSON.parse(this.responseText);
            // console.log(districtsObj);
            let output = "";
            output += `<option value="" selected disabled>Select District</option>`;
            for (let district in districtsObj) {
                output += `<option value="${district}">${district}</option>`;
            }
            districts.innerHTML = output;
        }
    }


}

populateDistricts();

//populate cities
function populateCities(district) {
    // console.log("populateCities called");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
    xhr.send();

    xhr.onload = function () {
        if (this.status == 200) {
            const citiesObj = JSON.parse(this.responseText);
            console.log(citiesObj);
            let output = "";
            output += `<option value="" selected disabled>Select City</option>`;
            console.log(district);
            console.log(citiesObj[district].cities);
            for (let city of citiesObj[district].cities) {
                output += `<option value="${city}">${city}</option>`;
            }
            cities.innerHTML = output;
        }
    };
}

//event listner for district change
districts.addEventListener("change", function () {
    // console.log("district changed");
    populateCities(this.value);
});

//get district using city using the cities.json file. cities.json is already loaded in to the file
function getDistrict(city) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", ROOT+"/assets/js/Technician/cities.json", true);
    xhr.send();

    xhr.onload = function () {
        if (this.status == 200) {
            const citiesObj = JSON.parse(this.responseText);
            console.log(citiesObj);
            //use for in loop to iterate through the object
            for (let district in citiesObj) {
                console.log(district);
                console.log(citiesObj[district].cities);
                if (citiesObj[district].cities.includes(city)) {
                    console.log(district);
                    console.log(city);
                    document.querySelector("#district").value = district;
                    document.querySelector("#district").dispatchEvent(new Event("change"));
                    document.querySelector("#city").value = city;
                    document.querySelector("#city").dispatchEvent(new Event("change"));
                    return district;
                }
            }
        }
    };
}


// <select multiple className="chosen-select" id="item">
// 	<optgroup label="Group 1">
// 		<option value="1">Option 1</option>
// 		<option value="2">Option 2</option>
// 	</optgroup>
// 	<optgroup label="Group 2">
// 		<option value="3">Option 3</option>
// 		<option value="4">Option 4</option>
// 	</optgroup>
// </select>
//populate items using templates json encoded variable. the structure is as follows: [{category_id:1,category_name:"category1",items:[{item_id:1,item_name:"item1"},{item_id:2,item_name:"item2"}]},{category_id:2,category_name:"category2",items:[{item_id:1,item_name:"item1"},{item_id:2,item_name:"item2"}]}]. category name goes to optgroup label (create opt group element and set label) and item name goes to option value. the html structure is as above

const items = document.querySelector("select#item");
console.log(items);
//no need of xhr data already in templates variable
function populateItems() {
    console.log(templates);
    categories =templates;
    console.log(categories);

    let output = "";
    for (let category of categories) {
        output += `<optgroup label="${category.category_name}">`;
        for (let template of category.itemtemplates) {
            console.log(template);
            output += `<option value="${template.itemtemplate_name}">${template.itemtemplate_name}</option>`;
        }
        output += `</optgroup>`;
    }
    items.innerHTML = output;
}

populateItems();
// select
$(".chosen-select").chosen({
    disable_search_threshold: 10,
    width: "100%"
});






//edit gig popup

const editGigBtn = document.querySelector("#editGig"); //edit gig button

editGigBtn.addEventListener("click", showEditPopup); //event listner for edit gig button

function showEditPopup(e) {
    e.preventDefault();
    openPopup('edit_gig');
    //load gig data to popup using buttons data attributes
    const gigdata = this.getAttribute("data-gigdata");
    const gig = JSON.parse(gigdata);
    console.log(gig);

    const popup = popups["edit_gig"];
    //populate popup form with gig data
    //split the value from , and populate the form
    var items = gig.items.split(",");
    var selectedItems = [];
    items.forEach(function(item) {
        selectedItems.push(item.trim());
    });
    console.log("methanata enwa");
    console.log(selectedItems);
    console.log($(".chosen-select#item").val(selectedItems).trigger("chosen:updated"));

    //populate district using city
    const location = gig.location;
    console.log(location);
    getDistrict(location);

    //delivery method
    const delivery_method = gig.delivery_method;
    console.log(delivery_method);
    document.querySelector("#delivery_method").value = delivery_method;

    document.querySelector("#title").value = gig.title;
    document.querySelector("#description").value = gig.description;
    document.querySelector('#update-btn').setAttribute('data-gig_id', gig.gig_id);


}

//edit gig form submit
const update_btn = document.querySelector("#update-btn");
update_btn.addEventListener("click", editGig);
const updateForm = document.querySelector("#editgigform");

//send data using formData object and xmlhttprequest
function editGig(e) {
    e.preventDefault();
    console.log("edit gig form submitted");
    const xhr = new XMLHttpRequest();
    const form = new FormData();


    //handle data from form
    form.append("gig_id", this.dataset.gig_id);
    form.append("title", updateForm.querySelector("#title").value);
    form.append("description", updateForm.querySelector("#description").value);
    form.append("location", updateForm.querySelector("#city").value);
    form.append('delivery_method', updateForm.querySelector('#delivery_method').value);

    var itemsInArray = $('#item').val();
    var selectedValues = itemsInArray.join(",");
    form.append("items", selectedValues);

    //image
    for (let i = 0; i < Files.length; i++) {
        form.append("images[]", Files[i]);
    }


    xhr.open("POST", ROOT+"/Technician/Gigs/editGig", true);
    xhr.onload = function () {
        if (this.status == 200) {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);
            console.log(response);
            if (response.status == "success") {
                console.log(response);
                formSuccessfull('edit_gig', "success", "Gig edited successfully");
                //reload page
                setTimeout(function () {
                    location.reload();
                }, 2000);
            } else {
                //show error message
                showUnsuccessfull('edit_gig', "error", "Gig edit failed");
            }
        }
    };
    xhr.send(form);
}