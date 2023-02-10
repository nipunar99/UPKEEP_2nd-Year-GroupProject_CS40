// Dropdown functionalities
const districtSelect = document.getElementById("itemtype");

const district = ['Refrigerator','Air Conditioner','Washer','TV','Solor Panel',
'Projector','Camera','PC','Laptop','Vehicle','Other'];

(function populateDistrict (){
    for(let i=0; i<district.length; i++){
        const option = document.createElement('option');
        option.textContent = district[i];
        districtSelect.appendChild(option);
    }
    districtSelect.value = 'Ampara';
})();

// Add Item view
const addItem = document.querySelector(".addItem");
const modal = document.querySelector(".popupview1");
const modal1 = document.querySelector(".popupview2");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnCloseModal1 = document.querySelector(".closebtn1");



// Show Modal function const showModal
const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

const showModal1 = function () {
    console.log("showModal1");
    modal1.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");

};
const closeModal1 = function () {
    modal1.classList.add("hidden");
    overlay.classList.add("hidden");

};
// show modal click event
addItem.addEventListener("click", showModal);

// close modal click
btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal1);
overlay.addEventListener("click", closeModal);




// //Ajax for add item details

document.getElementById("nextBtn").addEventListener('click',ajax_addItem);

function ajax_addItem(e){
    e.preventDefault();

    const formItemDetails = document.getElementById("form_itemDetails");

    const form = new FormData(formItemDetails);
    form.append("action","addItem");
    // const urlparams = new URLSearchParams(form);

    
    const xhr = new XMLHttpRequest();

    xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/Item");
    // xhr.setRequestHeader("Content-Type","application/json");             
    // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);
    
    closeModal();
    ajax_getItems();
    formItemDetails.reset();
    showModal1();

}

document.getElementById("finishBtn").addEventListener('click',function(){
    closeModal1();
    ajax_getItems();
});


document.addEventListener("DOMContentLoaded",function(){ajax_getItems()});

function ajax_getItems(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET","http://localhost/upkeep/upkeep/public/Itemowner/Item/getAllItem");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html = "";

            for (var a = 0; a < json.length; a++) {
                html += "<div >";
                html += "<div class='middle'>";
                html += "<div class='left'>";
                html += "<h3>"+json[a].item_name+"</h3>";
                html += "<h2>"+json[a].item_type+"</h1>";
                html += "</div>";
                html += "<div class='progress'>";
                html += "<img src='http://localhost/UpKeep/upkeep/public/assets/images/uploads/"+json[a].image+"'</div>";
                html += "</div></div>";
                html += "<div style='position: relative;top: 1rem;'>";
                html += "<form  method='post'>";
                html +="<input  style='display:none;' type='text' name='item_id' value='"+json[a].item_id+"'>";
                html +="<input  style='display:none;' type='text' name='owner_id'value='"+json[a].owner_id+"'>";
                html +="<div class='button moreBtn'> <input type='submit' value='More Details' style='background: navajowhite;background: none;'></div></form></div></div></div>";
            }
            document.querySelector(".insight").innerHTML = html;
        }
    }
    xhr.send();

}
