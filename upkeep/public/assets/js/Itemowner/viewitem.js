// Get all DOM and store in variable
// const controllerURL = "http://localhost/upkeep/upkeep/public/Itemowner/ViewItem";
const deleteMsg = document.querySelector(".deleteMsg");
const confirmbtn = document.querySelector(".confirmbtn");
const reminderbtn = document.querySelector("#addReminderbtn");
const maintenancebtn = document.querySelector("#addMaintenancebtn");

const overlay = document.querySelector(".overlayview");
const autoclick = document.querySelector(".autoclick");
const addMaintenceBtn = document.querySelector(".addMaitenanceEm");
const addMaintenanceForm = document.querySelector(".addMaintenanceForm");
const addMaintenanceForm2 = document.querySelector(".addMaintenanceForm2");
const addMaintainTaskbtn = document.querySelector(".addMaintainTask");

const allMaintenance = document.querySelector(".morebtn");
const main1 = document.querySelector(".main1");
const main2 = document.querySelector(".main2");
const right = document.querySelector(".right");
const container = document.querySelector(".container");
const backbtn = document.querySelector(".back");

//............... Add maintenance form constraints...............

    //.....set start date element
    const startdate = document.getElementById("startDate"); 
    var currentDate = new Date();
    var formattedDate = currentDate.toISOString().substr(0, 10);
    startdate.value = formattedDate;
    //.....set start date element

//............... Add maintenance form constraints...............

const btnCloseModal = document.querySelector(".closebtn");
const btnCloseModal1 = document.querySelector(".closebtn1");
const btnCloseModal2 = document.querySelector(".closebtn2");
const deleteConfirmation = document.querySelector(".deletebtn");

// Show Modal function const showModal
const deleteMsgFunc = function () {
    console.log("button clicked");
    deleteMsg.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal all the popup views function
const closeModal = function () {
    console.log("button clicked");
    deleteMsg.classList.add("hidden");
    overlay.classList.add("hidden");
    addMaintenanceForm.classList.add("hidden");
    addMaintenanceForm2.classList.add("hidden");
    // removeEvent();
};
const addMaintenaceFormFunc = function () {
    console.log("button clicked");
    overlay.classList.remove("hidden");
    addMaintenanceForm.classList.remove("hidden");
    // removeEvent();
};

// show modal click event
deleteConfirmation.addEventListener("click", deleteMsgFunc);
// close modal click

btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal);
btnCloseModal2.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

//Ajax functions call
confirmbtn.addEventListener("click", ajax_deleteItem);
reminderbtn.addEventListener("click", ajax_addReminder);
maintenancebtn.addEventListener("click", ajax_addMaintenance);
addMaintenceBtn.addEventListener("click", addMaintenaceFormFunc);



//add maintanance form popup

const showModal = function () {
    console.log("button clicked");
    // modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 


// Load all maintanance

allMaintenance.addEventListener ("click", () => {
    console.log("button clicked");
    main1.classList.add("hidden");
    right.classList.add("hidden");
    main2.classList.remove("hidden");
    container.classList.add("newgrid-container");
})

// Close all maintanence
backbtn.addEventListener("click", () => {
    main1.classList.remove("hidden");
    right.classList.remove("hidden");
    main2.classList.add("hidden");
    container.classList.remove("newgrid-container");
})

// Add maintain task

addMaintainTaskbtn.addEventListener("click", () => {
    console.log("addMaintainTaskbtn clicked");
    addMaintenanceForm2.classList.remove("hidden");
    overlay.classList.remove("hidden");
})




// AJAX for the delete an item

function ajax_deleteItem(){
    const item_id = document.querySelector(".item_id").innerHTML;
    const form = new FormData();
    form.append("action","deleteItem");
    form.append("item_id",item_id);
    // console.log(item_id);
    const urlparams = new URLSearchParams(form);

    
    const xhr = new XMLHttpRequest();

    xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/ViewItem");
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }
    xhr.send(urlparams);

    closeModal();
    autoclick.click();
}


// Ajax for the add reminder

function ajax_addReminder(e){
    e.preventDefault();
    const formReminderDetails = document.getElementById("form_reminderDetails");

    const form = new FormData(formReminderDetails)
    form.append("action","addReminder");

    const xhr = new XMLHttpRequest();

    xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/ViewItem");
    // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);

    closeModal();
    formReminderDetails.reset();
}


// Ajax for the add Maintenance
function ajax_addMaintenance(e){
    e.preventDefault();

    const formMaintenanceDetails = document.getElementById("form_maintenanceDetails");

    const form = new FormData(formMaintenanceDetails);
    form.append("action", "addMaintenance");

    const xhr = new XMLHttpRequest();
    xhr.open("POST","http://localhost/upkeep/upkeep/public/Itemowner/ViewItem");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };

    xhr.send(form);

    closeModal();
    formMaintenanceDetails.reset();
    
}