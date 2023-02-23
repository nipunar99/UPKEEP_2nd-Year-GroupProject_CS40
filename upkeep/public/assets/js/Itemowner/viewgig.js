// Importent global variable
var citiesjson;
var itemsjson;
document.addEventListener("DOMContentLoaded",function(){loadItems();loadCitiesJson();});

const hirebtn = document.querySelector(".hirebtn");
const closebtn = document.querySelector(".closebtn");
const overlay = document.querySelector(".overlayview");
const popupview = document.querySelector(".popupview");

hirebtn.addEventListener("click", function(){
    overlay.classList.remove("hidden");
    popupview.classList.remove("hidden");
});

closebtn.addEventListener("click", function(){
    overlay.classList.add("hidden");
    popupview.classList.add("hidden");
});


// set current date as default to the date input 
const currentDate = new Date().toISOString().substr(0, 10);
document.getElementById("schedule_date").value = currentDate;


// set value for job type select

const jobtype = document.getElementById("jobtype");

const values = ['home visit','Others'];

(function populateValues (){
    for(let i=0; i<values.length; i++){
        const option = document.createElement('option');
        option.textContent = values[i];
        jobtype.appendChild(option);
    }
    jobtype.value = 'others';
})();


// cities json file................................................................
var districtNames;
function loadCitiesJson(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/UpKeep/upkeep/public/assets/js/Itemowner/cities.json', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const res = xhr.responseText;
            citiesjson = JSON.parse(res);
            districtNames = Object.keys(citiesjson);
            console.log(districtNames.length);

            loadCitiestoSelect();
        }
      };
    xhr.send();
      
}
// cities json file................................................................



function loadItems(){
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/upkeep/upkeep/public/Itemowner/ViewGig/getAllItem', true);
    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            itemsjson = JSON.parse(res);
            const itemNameSelect = document.getElementById('itemname');

            for (var a = 0; a < itemsjson.length; a++) {
                const option = document.createElement('option');
                option.textContent = itemsjson[a].item_name;
                itemNameSelect.appendChild(option);
            }
        }
    }
    xhr.send();
      
}

// Set data form elements (item_name and Item_id)......................................................................

const itemNameSelect = document.getElementById('itemname');
const inputItemId = document.getElementById('itemid');

itemNameSelect.addEventListener('change', function() {
    for (var a = 0; a < itemsjson.length; a++) {
        if (itemNameSelect.value === itemsjson[a].item_name) {
            inputItemId.value = itemsjson[a].item_id;
        }
    }
});
// Set data form elements (item_name and Item_id)......................................................................



// Set data form elements (district and cites)......................................................................

function loadCitiestoSelect(){
    districtNames = Object.keys(citiesjson);

    const districtSelect = document.getElementById('district');

    for (var a = 0; a < districtNames.length; a++) {
        const option = document.createElement('option');
        option.textContent =districtNames[a];
        districtSelect.appendChild(option);
    }
}

const districtSelect = document.getElementById('district');
const inputcity = document.getElementById('city');

districtSelect.addEventListener('change', function() {
    inputcity.innerHTML = '';
    console.log(districtSelect.value);
    var district = districtSelect.value;
    var cities = citiesjson[district].cities;
    console.log(cities.length);
    
    for (var a = 0; a < cities.length; a++) {
        const option = document.createElement('option');
        option.textContent =cities[a];
        inputcity.appendChild(option);
    }
});

// Set data form elements (district and cites)......................................................................


//Get data form elements ..................................................................

function submitPost(){
    ajax_completeTask();
}

function ajax_completeTask(){
    const formCompleteDetails = document.getElementById("form_JobDetails");

    const form = new FormData(formCompleteDetails);
    form.append("action", "addJob");
    const xhr = new XMLHttpRequest();
    xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/ViewGig/addJob");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };

    xhr.send(form);

    document.querySelector(".closebtn").click();

}