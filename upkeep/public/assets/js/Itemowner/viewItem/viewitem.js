var disposalPlacesjson = null;
var documentationjson = null;
var MaintainTaskjson = null;
var ongoingReminders = null;
var overdueReminders = null;

//validataion checking flag
var errocheckflag = 0;
//////////////////////////

const deleteMsg = document.querySelector(".deleteMsg");
const confirmbtn = document.querySelector(".confirmbtn");
const reminderbtn = document.querySelector("#addReminderbtn");
const maintenancebtn = document.querySelector("#addMaintenancebtn");


const overlay = document.querySelector(".overlayview");
const autoclick = document.querySelector(".autoclick");
const addMaintenceBtn = document.querySelector(".addMaitenanceEm");
const addMaintenanceForm = document.querySelector(".addMaintenanceForm");
const addMaintenanceForm2 = document.querySelector(".addMaintenanceForm2");
const addDocumentForm = document.querySelector(".addDocumentForm");
const editItemform = document.querySelector(".editItemform");



const addMaintainTaskbtn = document.querySelector(".addMaintainTask");
const docsbtn =  document.querySelector(".docbtn");

const itempannelbtn =  document.querySelector(".itempannelbtn");
const itempannel = document.querySelector(".right");
const itempannelclosebtn = document.querySelector(".itempannelclosebtn");

const closeMapebtn = document.querySelector("#closeMap");

const allMaintenance = document.querySelector(".morebtn");
const Itemdoc = document.querySelector(".docbtn");
const disposeguide = document.querySelector(".disposebtn");
const main1 = document.querySelector(".main1");
const main2 = document.querySelector(".main2");
const main3 = document.querySelector(".main3");
const main4 = document.querySelector(".main4");
const right = document.querySelector(".right");
const container = document.querySelector(".container");
const backbtn = document.querySelector(".back");
const backbtn2 = document.querySelector(".back2");
const backbtn3 = document.querySelector(".back3");
// const addDocbtn = document.querySelector(".addDoc");
const closedocbtn = document.querySelector(".closedocbtn");
const closeupdatebtn = document.querySelector(".closeupdatebtn");

//...............................slide bar.......................
const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener("click", () => {
    sideMenu.style.display = "block";
})
 closeBtn.addEventListener("click", () => {
    sideMenu.style.display = "none";
})
//...............................................................



/////////////////////////////////Valideation check functions //////////////////////////////////////////////

function showError(input, message) {
    errocheckflag++;
    input.classList.add("erroInput");
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    console.log(small);
    small.innerText = message;

}

function showSuccess(input) {
    input.classList.remove("erroInput");
  }

function checkRequired(inputArr) {
    inputArr.forEach(function (input) {
      if (input.value === '') {
        showError(input, `${getFieldName(input)} is required`);
      }else{
        showSuccess(input);
      } 
    });
}

function checkRange(input, min, max) {
    if (parseFloat(input.value) < min) {
      showError(input, `${getFieldName(input)} must be at least ${min}`);
    } else if (parseFloat(input.value) > max) {
      showError(input, `${getFieldName(input)} must be less than ${max} characters`);
    } else {
      showSuccess(input);
    }
}
function checkStartDate(input) {
    var inputDate = new Date(input.value);
    var currentDate = new Date();

    if (inputDate < currentDate) {
        showError(input, `${getFieldName(input)} is invalid Date`);
    } else {
        showSuccess(input);
    }
}

function getFieldName(input) {
    return input.id.replace(/_/g, " ").split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
}

function setSmallNull(){
    var smallTags = document.querySelectorAll('small');
    for (var i = 0; i < smallTags.length; i++) {
      smallTags[i].innerHTML = null;
    }
}

function checkFileType(file){
    var fileExt = file.value.substring(file.value.lastIndexOf('.')+1);
  
      if (fileExt.toLowerCase() === 'jpeg' || fileExt.toLowerCase() === 'png' || fileExt.toLowerCase() === 'jpg'|| fileExt.toLowerCase() === 'pdf' ||file.type === '') {
          if(parseFloat(file.files[0].size/(1024*1024))>3 ){
            showError(file, 'File size must be less than 3MB.');
          }
          else{
            showSuccess(file);
          }
      }else {
        showError(file, 'File type not supported.');
      }
  }

function checkImageType(file){
    var fileExt = file.value.substring(file.value.lastIndexOf('.')+1);
    if (fileExt.toLowerCase() === 'jpeg' || fileExt.toLowerCase() === 'png' || fileExt.toLowerCase() === 'jpg'|| file.value === '') {
        if(parseFloat(file.files[0].size/(1024*1024))>3 ){
        showError(file, 'File size must be less than 3MB.');
        }
        else{
        showSuccess(file);
        }
    }else {
        console.log('Checking image type');
        showError(file, 'File type not supported.');
    }
}
///////////////////////////////////////////////////////////////////////////////




//.......................open item pannel.......................
itempannelbtn.addEventListener('click', () => {
    itempannel.classList.add("animateOpenRight");
    itempannel.classList.remove("animateCloseRight");
})
//........................................................

//.......................Close item pannel.......................
itempannelclosebtn.addEventListener('click', () => {
    itempannel.classList.remove("animateOpenRight");
    itempannel.classList.add("animateCloseRight");
})
//........................................................


var firstIndex = 0;

//............... Add maintenance form constraints...............

document.addEventListener("DOMContentLoaded",function(){
    ajax_getAllReminders();
    ajax_getAllMaintenance();
    ajax_getAllOverdueReminders();
    display1details();
    display3details();
    display2details();
    disposalPlaces();
    ajax_loadDocumentation();
});


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
    editReminderForm.classList.add("hidden");
    addMaintenanceForm2.classList.add("hidden");
    addDocumentForm.classList.add("hidden");
    editItemform.classList.add("hidden");
    document.querySelector(".imgeView").classList.add("hidden");
    // removeEvent();
};
const addMaintenaceFormFunc = function () {
    overlay.classList.remove("hidden");
    addMaintenanceForm.classList.remove("hidden");
};
function loadDocumentForm(){
    console.log("button clicked");
    overlay.classList.remove("hidden");
    addDocumentForm.classList.remove("hidden");
}

// show modal click event
deleteConfirmation.addEventListener("click", deleteMsgFunc);


///////////////////close modal click
btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal);
btnCloseModal2.addEventListener("click", closeModal);
closedocbtn.addEventListener("click", closeModal);
closeupdatebtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);


//Ajax functions call
confirmbtn.addEventListener("click", ajax_deleteItem);
reminderbtn.addEventListener("click",addreminder);
maintenancebtn.addEventListener("click",addMaintenanceTask);
addMaintenceBtn.addEventListener("click", addMaintenaceFormFunc);



//add maintanance form popup

const showModal = function () {
    console.log("button clicked");
    // modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 


// Load all maintanance

allMaintenance.addEventListener ("click", () => {
    main1.classList.add("hidden");
    right.classList.add("hidden");
    main2.classList.remove("hidden");
    container.classList.add("newgrid-container");
    loadOngoingReminderList();loadOverdueReminderList();
})

//......................................................

// Load Documentation

Itemdoc.addEventListener ("click", () => {
    main1.classList.add("hidden");
    right.classList.add("hidden");
    main4.classList.remove("hidden");
    container.classList.add("newgrid-container");
})

//......................................................

// Load all maintanance

disposeguide.addEventListener ("click", () => {
    main1.classList.add("hidden");
    right.classList.add("hidden");
    main2.classList.add("hidden");
    main3.classList.remove("hidden");
    container.classList.add("newgrid-container");
})
//......................................................


// Close all maintanence
function handleClick() {
    main1.classList.remove("hidden");
    right.classList.remove("hidden");
    container.classList.remove("newgrid-container");
    main2.classList.add("hidden");
    main3.classList.add("hidden");
    main4.classList.add("hidden");
}

backbtn.addEventListener("click", handleClick);
backbtn2.addEventListener("click", handleClick);
backbtn3.addEventListener("click", handleClick);
//................................................................

//..................How pre disposal
const predisposal = document.querySelector(".predisposal");
const reuse = document.querySelector(".reuse");
const resell = document.querySelector(".resell");
const scrap = document.querySelector(".scrap");

document.querySelector(".predisposalbtn").addEventListener("click", () => {
    predisposal.classList.remove("hidden");
    reuse.classList.add("hidden");
    resell.classList.add("hidden");
    scrap.classList.add("hidden");
});

document.querySelector(".reusebtn").addEventListener("click", () => {
    predisposal.classList.add("hidden");
    reuse.classList.remove("hidden");
    resell.classList.add("hidden");
    scrap.classList.add("hidden");
});

document.querySelector(".resellbtn").addEventListener("click", () => {
    predisposal.classList.add("hidden");
    reuse.classList.add("hidden");
    resell.classList.remove("hidden");
    scrap.classList.add("hidden");
});

document.querySelector(".scrapbtn").addEventListener("click", () => {
    predisposal.classList.add("hidden");
    reuse.classList.add("hidden");
    resell.classList.add("hidden");
    scrap.classList.remove("hidden");
});

//................................................................

// Add maintain task

addMaintainTaskbtn.addEventListener("click", () => {
    console.log("addMaintainTaskbtn clicked");
    addMaintenanceForm2.classList.remove("hidden");
    overlay.classList.remove("hidden");
});

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

function addreminder(){
    ajax_addReminder();
    ajax_getAllReminders();
}
function ajax_addReminder(e){
    // e.preventDefault();
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


// Ajax for the get all reminders


function ajax_getAllReminders(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/getAllReminders");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            ongoingReminders =json;
            var html = "";

            if (json.length > 0){
                
                for (var i = 0; i < json.length; i++) {
                    html+= "<div onclick='loadupcomeview("+(i+1)+")'  class='maintenceBox' role='button'><h3>Maintenance Schedule</h3>";   
                html+= "<div><div class='middle'>";   
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h4>"+json[i].description+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span>";
                html+= "<h4>"+json[i].start_date+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h4>"+json[i].sub_component+"</h4></div>";
                html+= "<div class='maintenanceStatus'><span class='material-icons-sharp'>error_outline</span>";
                html+= "<h4>Pending</h4></div></div>";
                html+= "<img src='"+ROOT+"/assets/images/uploads/"+json[i].image+"'></div></div>";
                
                html+= "<div  class='upcomepopupview"+(i+1)+" hidden popupview'><button onclick='unloadupcomeview("+(i+1)+")' class='closebtn'>&times;</button>";
                
                html+= "<div class='maintenaceview"+(i+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Item name</h3><h2>"+json[i].item_name+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3>Maintenance task</h3><h2>"+json[i].description+"</h2>";
                html+= "<h2 id='itemid"+(i+1)+"'style='display: none;'>"+json[i].item_id+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[i].start_date+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3><h2>"+json[i].sub_component+"</h2></div>";
                html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h3>Pending</h3></div></div>";
                html+= "<h2 id='taskID"+(i+1)+"' style='display: none;'>"+json[i].task_ID+"</h2>";
                html+= "<div class='action_btn'><button class='complete' onclick='completeTask("+(i+1)+")'>Complete</button> <button class='edit' >Edit</button> <button class='cancel' id='deletebtn"+(i+1)+"' onclick='deleteTask("+(i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

                html+= "<div class='completeform"+(i+1)+" hidden'>";
                html+= "<form method='post' id='form_completeTask"+(i+1)+"'>";
                html+= "    <h2>Maintenance Details</h2>";
                html+= "        <div class='middleInput'>";
                html+= "            <div class='input-box'>";
                html+= "            <span class='details'>Summary of Maintenance</span>";
                html+= "                <input type='text' name='description' id='' required  placeholder='Enter Description'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Complete Date</span>";
                html+= "                <input type='date'  name='finished_date' required  placeholder='Enter complete date'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Cost for Maintenance</span>";
                html+= "                <input type='number' min='0' name='cost'  placeholder='Enter Maintenance Cost'>";
                html+= "            </div>";
                html+= "        </div>";
                html+= "        <div onclick='submitTask("+(i+1)+")' class='button completebtn'>";
                html+= "            <input type='button' value='Done' class='completeTaskbtn confirmbtn'>";       
                html+= "        </div>";
                html+= "</form>";
                html+= "<div class='action_btn'>";
                html+= "    <button onclick='cancelcompleteTask("+(i+1)+")' class='cancelbtn cancel'>Cancel</button>";
                html+= "</div> </div>";
                html+= "</div>";
                }
            }else{
                html += "<h2>No data available</h2>";
            }
            
            document.querySelector(".maintenceBoxes").innerHTML = html;
            firstIndex = i;
        }
    }
    xhr.send();

    loadOngoingReminderList();
}

function ajax_getAllOverdueReminders() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',""+ROOT+"/Itemowner/ViewItem/getAllOverdueReminders");

    xhr.onload = function () {
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            overdueReminders = json;
            var html="";

            for(var i=0; i<json.length; i++){
                html+= "<div onclick='loadupcomeview("+(firstIndex+i+1)+")'  class='maintenceBox' role='button'><h3>Maintenance Schedule</h3>";   
                html+= "<div><div class='middle'>";   
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h4>"+json[i].description+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span>";
                html+= "<h4>"+json[i].start_date+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h4>"+json[i].sub_component+"</h4></div>";
                html+= "<div class='maintenanceStatus'><span class='material-icons-sharp'>error_outline</span>";
                html+= "<h4>Pending</h4></div></div>";
                html+= "<img src='"+ROOT+"/assets/images/uploads/"+json[i].image+"'></div></div>";
                
                html+= "<div  class='upcomepopupview"+(firstIndex+i+1)+" hidden popupview'><button onclick='unloadupcomeview("+(firstIndex+i+1)+")' class='closebtn'>&times;</button>";
                
                html+= "<div class='maintenaceview"+(firstIndex+i+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Item name</h3><h2>"+json[i].item_name+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3>Maintenance task</h3><h2>"+json[i].description+"</h2>";
                html+= "<h2 id='itemid"+(firstIndex+i+1)+"'style='display: none;'>"+json[i].item_id+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[i].start_date+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3><h2>"+json[i].sub_component+"</h2></div>";
                html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h3>Pending</h3></div></div>";
                html+= "<h2 id='taskID"+(firstIndex+i+1)+"' style='display: none;'>"+json[i].task_ID+"</h2></div>";
                html+= "<div class='action_btn'><button onclick='completeTask("+(firstIndex+i+1)+")'>Complete</button> <button>Edit</button> <button id='deletebtn"+(firstIndex+i+1)+"' onclick='deleteTask("+(firstIndex+i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

                html+= "<div class='completeform"+(firstIndex+i+1)+" hidden'>";
                html+= "<form method='post' id='form_completeTask"+(firstIndex+i+1)+"'>";
                html+= "    <h2>Maintenance Details</h2>";
                html+= "        <div class='middleInput'>";
                html+= "            <div class='input-box'>";
                html+= "            <span class='details'>Summary of Maintenance</span>";
                html+= "                <input type='text' name='description' id='' required  placeholder='Enter Summary'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Complete Date</span>";
                html+= "                <input type='date'  name='finished_date' required  placeholder='Enter complete date'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Cost for Maintenance</span>";
                html+= "                <input type='number' min='0' name='cost'  placeholder='Enter Maintenance Cost'>";
                html+= "            </div>";
                html+= "        </div>";
                html+= "        <div onclick='submitTask("+(firstIndex+i+1)+")' class='button completebtn'>";
                html+= "            <input type='button' value='Done' class='completeTaskbtn'>";       
                html+= "        </div>";
                html+= "</form>";
                html+= "<div class='action_btn'>";
                html+= "    <button onclick='cancelcompleteTask("+(firstIndex+i+1)+")' class='cancelbtn'>Cancel</button>";
                html+= "</div> </div>";
                html+= "</div>";
            }
            document.querySelector(".overduemaintenceBoxes").innerHTML=html;
        }

    }
    xhr.send();
}

const sub_component = document.getElementById("sub_component");
const description = document.getElementById("description");
const upfileimage = document.getElementById("upfileimage");
const years = document.getElementById("years");
const months = document.getElementById("months");
const weeks = document.getElementById("weeks");
const strt_date = document.getElementById("strt_date");


function addMaintenanceTask(e){
    e.preventDefault();
    ajax_addMaintenance();
    ajax_getAllMaintenance();
}
function ajax_addMaintenance(){
    errocheckflag = 0;
    setSmallNull();

    checkRequired([description,strt_date]);

    if(years.value=='' && months .value=='' && weeks.value==''){
        showError(months,"Please Enter a time");
    }else{
        if(years.value!=''){
            checkRange(years,0,50);
        }else{
            years.value=0;
        }
        if(months.value!=''){
            checkRange(months,0,12);
        }else{
            months.value=0;
        }
        if(weeks.value!=''){
            checkRange(weeks,0,4);
        }else{
            weeks.value=0;
        }
    }
    checkImageType(upfileimage);

    checkStartDate(strt_date);
    
    if(errocheckflag == 0){
        const formMaintenanceDetails = document.getElementById("form_maintenanceDetails");

        const form = new FormData(formMaintenanceDetails);
        form.append("action", "addMaintenance");

        const xhr = new XMLHttpRequest();
        xhr.open("POST",""+ROOT+"/Itemowner/ViewItem");

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
    ajax_getAllMaintenance();
}


function ajax_getAllMaintenance(){

    const xhr = new XMLHttpRequest();
    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/getAllMaintenance");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            MaintainTaskjson=json;
            var html = "";

            if (json.length < 1){   
                html += "<tr><td>No data available</td></tr>";
            }else{
                for (var a = 0; a < json.length; a++) {
  
                        html +="<tr><td>"+json[a].description+"</td>";
                        html +="<td>"+json[a].sub_component+"</td>";
                        html +="<td class='warning' >"+json[a].start_date+"</td>";
                        if(json[a].years =='0'){
                            html +="<td>";
                        }else{
                            html +="<td><span>"+json[a].years+"</span> <span> years</span> ";
                        }
                        if(json[a].months =='0'){
                            html +="";
                        }else{                        
                            html +="<span>"+json[a].months+"</span> <span>months</span> ";
                        }
                        if(json[a].weeks =='0'){
                            html +="";
                        }else{
                            html +="<span>"+json[a].weeks+"</span> <span> weeks</span></td>";
                        }
                        if(MaintainTaskjson[a].status =="Active"){
                            html +="<td class='success'>"+json[a].status+"</td>";
                        }else{
                            html +="<td class='danger'>"+json[a].status+"</td>";
                        }
                        html +="<td class='primary test'><button onclick='loadTableRowView("+a+")' class='tableAction'>Action</button></td></tr>";


                }
            }
            
            document.querySelector(".maintenanceListTbody").innerHTML = html;
        }
    }

    xhr.send();
}

function loadTableRowView(num){
    overlay.classList.remove("hidden");

    console.log(num);
    var html = "";
    
    html+= "<div  class='popupMaintask"+(num+1)+ " popupMaintask popupview'><button onclick='unloadMaintask("+(num+1)+")' class='closebtn'>&times;</button>";
                
    html+= "<div class='maintenaceview"+(num+1)+"'> <div class='content'><div><span class='material-icons-sharp'>view_in_ar</span><h3>Description</h3><h2>"+MaintainTaskjson[num].description+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h3> Sub Component</h3><h2>"+MaintainTaskjson[num].sub_component+"</h2>";
    html+= "<h2 id='itemid'style='display: none;'>"+MaintainTaskjson[num].item_id+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+MaintainTaskjson[num].start_date+"</h2></div>";
    html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3>";

    if(MaintainTaskjson[num].years =='0'){
        html +="<h2>";
    }else{
        html +="<h2><span>"+MaintainTaskjson[num].years+"</span> <span> years</span> ";
    }
    if(MaintainTaskjson[num].months =='0'){
        html +="";
    }else{                        
        html +="<span>"+MaintainTaskjson[num].months+"</span> <span>months</span> ";
    }
    if(MaintainTaskjson[num].weeks =='0'){
        html +="</h2></div>";
    }else{
        html +="<span>"+MaintainTaskjson[num].weeks+"</span> <span> weeks</span></h2></div>";
    }

    if(MaintainTaskjson[num].status =="Active"){
        html+= "<div class='maintenanceStatus success'><span class='material-icons-sharp'>error_outline</span><h2 class='success'>"+MaintainTaskjson[num].status+"</h2></div></div>";
        html+= "<div class='action_btn'><button class='cancel' onclick='TaskStatus("+num+")'>Deactive</button>  <button class='cancel' onclick='deleteMainTask("+MaintainTaskjson[num].task_ID+")'>Delete</button> </div> </div>";

    }else{
        html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h2 class='danger'>"+MaintainTaskjson[num].status+"</h2></div></div>";
        html+= "<div class='action_btn'><button class='cancel' onclick='TaskStatus("+num+")'>Active</button>  <button class='cancel' onclick='deleteMainTask("+MaintainTaskjson[num].task_ID+")'>Delete</button> </div> </div>";
    }

    document.querySelector('.loadDivViews').innerHTML=html;
}

function TaskStatus(num){
    ajax_TaskStatus(num);
    ajax_getAllMaintenance();
    document.querySelector('.popupMaintask').classList.add('hidden');
    overlay.classList.add('hidden');
}

function ajax_TaskStatus(num) {
    const form = new FormData();
    form.append("task_id",MaintainTaskjson[num].task_ID);

    if(MaintainTaskjson[num].status =="Active"){
        form.append("status","Deactive");
    }else{
        form.append("status","Active");
    }
    const urlparams = new URLSearchParams(form);
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Itemowner/ViewItem/updateTask");
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }
    xhr.send(urlparams);
}

function unloadMaintask(popup){
    element = ".popupMaintask"+popup+"";
    
    document.querySelector(element).classList.add("hidden");
    overlay.classList.add("hidden");
}

function deleteMainTask(id){
    taskId = id;
    ajax_deleteMainTask();
    ajax_getAllMaintenance();
    document.querySelector('.popupMaintask').classList.add('hidden');
    overlay.classList.add('hidden');
}

function ajax_deleteMainTask() {
    const form = new FormData();
    form.append("task_id",taskId);
    const urlparams = new URLSearchParams(form);
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Itemowner/ViewItem/deleteTask");
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }
    xhr.send(urlparams);
}

// Ajax for the get latest maintenance for the display 1

function display1details(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/display1details");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html = "";

            if (json.status != "empty"){
                html += "<div class='middle'><span class='material-icons-sharp'>construction</span>";
                if(json[0].moreDays == "0"){
                    html += "<div class='left'><h3><span style='font-size: 1.6rem; font-weight: 600;'> Today </span></h3><h3>Days more</h3></div></div>"
                }else{
                    html += "<div class='left'><h3><span>"+json[0].moreDays+"</span></h3><h3>Days more</h3></div></div>"
                }
                    html += "<h4>"+json[0].description+"</h4>"
            }else{
                html += "<h2>No data available</h2>";
            }
            
            document.querySelector(".mainDisplay1").innerHTML = html;
        }
    }
    xhr.send();
}

function display2details(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/display2details");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html = "";

            if (json.status != "empty"){
                
                html += "<div class='middle'><span class='material-icons-sharp'>construction</span>";
                html += "<div class='left'><h3><span>"+json[0].moreDays+"</span></h3><h3>Days more</h3></div></div>"
                html += "<h4>Warranty Date : " +json[0].warrenty_date+"</h4>"
                
            }else{
                html += "<h2>No data available</h2>";
            }
            
            document.querySelector(".mainDisplay2").innerHTML = html;
        }
    }
    xhr.send();
}

function display3details(){
    const xhr = new XMLHttpRequest();
    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/display3details");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html = "";

            if (json.status != "empty"){
                
                html += "<div class='middle'><span class='material-icons-sharp'>construction</span>";
                html += "<div class='left'><h3><span>"+json[0].leftDays+"</span></h3><h3>Days more</h3></div></div>"
                html += "<h4>"+json[0].description+"</h4>"
                
            }else{
                html += "<h3>No data available</h3>";
            }
            
            document.querySelector(".mainDisplay3").innerHTML = html;
        }
    }
    xhr.send();
}


function loadupcomeview(popup){
    element = ".upcomepopupview"+popup+"";
    
    document.querySelector(element).classList.remove("hidden");;
    overlay.classList.remove("hidden");
}

function unloadupcomeview(popup){
    element = ".upcomepopupview"+popup+"";
    
    document.querySelector(element).classList.add("hidden");;
    overlay.classList.add("hidden");
}
function completeTask(window){
    
    document.querySelector(".maintenaceview"+window+"").classList.add("hidden");
    document.querySelector(".completeform"+window+"").classList.remove("hidden");

}

function cancelcompleteTask(window){
    document.querySelector(".maintenaceview"+window+"").classList.remove("hidden");
    document.querySelector(".completeform"+window+"").classList.add("hidden");

}

function submitTask(number){
    submintFormNum = number;
    ajax_completeTask();
    ajax_generateReminder();
    // document.getElementById("deletebtn"+submintFormNum+"").click();
}

//............................................................................

function ajax_completeTask() {
    const formCompleteDetails = document.getElementById("form_completeTask"+submintFormNum+"");
    const itemid = document.getElementById("itemid"+submintFormNum+"").innerHTML;    
    const taskId = document.getElementById("taskID"+submintFormNum+"").innerHTML;

    const form = new FormData(formCompleteDetails);
    form.append("action", "completeTask");
    form.append("task_ID", taskId);
    form.append("item_id", itemid);
    const xhr = new XMLHttpRequest();
    xhr.open("POST",""+ROOT+"/Itemowner/Userdashboard/completeTask");   

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };

    xhr.send(form);
    cancelcompleteTask(submintFormNum);
    unloadupcomeview(submintFormNum);
}

function ajax_generateReminder(){
    const taskId = document.getElementById("taskID"+submintFormNum+"").innerHTML;
    const xhr = new XMLHttpRequest();
    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/generateReminder/"+taskId+"",true);   

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    };

    xhr.send();
}


function deleteTask(number,id){
    deleteTaskNum = number;
    reminderid = id;
    ajax_deleteTask();
    ajax_getAllReminders();
}

function ajax_deleteTask() {
    const form = new FormData();
    form.append("action","deleteTask");
    form.append("reminder_id",reminderid);
    const urlparams = new URLSearchParams(form);
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Itemowner/Userdashboard/deleteTask");
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }
    xhr.send(urlparams);
    unloadupcomeview(deleteTaskNum);
}

function disposalPlaces(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/disposalplaces");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            disposalPlacesjson = JSON.parse(res);
            var html = "";

            if (disposalPlacesjson.status != "empty"){
                for (var i = 0; i < disposalPlacesjson.length; i++) {
                    html += " <div class='disposeplace"+i+"' onclick='loadMap("+i+")'>"
                    html += "   <h2>"+disposalPlacesjson[i].place_name+"</h2>"
                    html += "   <p>"+disposalPlacesjson[i].city+"</p>"
                    html += " </div>"
                }
            }else{
                html += "<h2>No data available</h2>";
            }
            
            document.querySelector(".diposalplaces").innerHTML = html;
        }
    }
    xhr.send();
}

function loadMap(index){
    var closebtnmap = "<div onclick = 'closeMapfunc()' class='closebtn closeMapBtn' id='closeMap'><span class='material-icons-sharp'>close</span></div>";
    for (var i = 0; i < disposalPlacesjson.length; i++) {
        document.querySelector(".disposeplace"+i+"").classList.remove("placeSelect");

    }

    document.querySelector(".mapdiv").innerHTML = disposalPlacesjson[index].iframe_link +closebtnmap;
    document.getElementsByTagName("iframe")[0].width= '700';

    document.querySelector(".disposeplace"+index+"").classList.add("placeSelect");
    document.querySelector(".mapdiv").classList.remove("animateCloseMap");
    document.querySelector(".mapdiv").classList.add("animateOpenMap");

}

//.......................Close Map.......................

function closeMapfunc(){
    console.log("close");
    document.querySelector(".mapdiv").classList.remove("animateOpenMap");
    document.querySelector(".mapdiv").classList.add("animateCloseMap");
}
//........................................................


//.......................Documentation load.......................
function ajax_loadDocumentation(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/loadDocumentaions");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            documentationjson = json;
            var html = "";
            if (json.length > 0){
                for (var i = 0; i < json.length; i++) {
                    html += "<div onclick='loadImage("+(i+1)+")'>";
                    html += "            <img src='"+ROOT+"/assets/images/uploads/"+json[i].file_name+"'>";

                    let oprateString = json[i].document_name; // replace "_" to Space
                    let fileName = oprateString.replace(/_/g, " ").split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");

                    html += "            <h3>"+fileName+"</h3>";
                    html += "</div>";
                }   
            }else{
                html += "<h2>No data available</h2>";
            }
            html += " <button onclick='loadDocumentForm()' class='addDoc'>Add Document</h3></button";
            document.querySelector(".documentation").innerHTML = html;

        }
    }
    xhr.send();
}

function loadImage(i){
    var html = "";
    overlay.classList.remove("hidden");
    document.querySelector(".imgeView").classList.remove("hidden");

    html += "<img src='"+ROOT+"/assets/images/uploads/"+documentationjson[i-1].file_name+"'>";

    document.querySelector(".imgeView").innerHTML = html;

}
////////////////////////////////////////////////////////////////////////////////////////


//.......................Documentation Add.......................

function addDocument(){
    ajax_addDocumentation();
}

const document_name = document.getElementById("document_name");
const upfile = document.getElementById("addDocfile");

function ajax_addDocumentation(e){
    errocheckflag = 0;
    // e.preventDefault();
    const formdocfiles = document.getElementById("form_documentDetails");
    checkRequired([document_name]);

    // if(upfile.value === ''){
        checkFileType(upfile);
    // }

    if(errocheckflag == 0){
        const form = new FormData(formdocfiles);
        form.append("action","adddoc");
        // const urlparams = new URLSearchParams(form);

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/ViewItem/addDocumentaions");
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
        formdocfiles.reset();
        ajax_loadDocumentation();
    }
}

//........................................................

///////////////////////////UPDATE ITEM DETAILS////////////////


document.querySelector(".editItem").addEventListener("click",()=>{
    overlay.classList.remove("hidden");
    editItemform.classList.remove("hidden");

});


function updateItem(){

}
function ajax_addDocumentation(e){
    errocheckflag = 0;
    // e.preventDefault();
    setSmallNull();
    const formdocfiles = document.getElementById("form_documentDetails");
    checkRequired([document_name]);

    checkFileType(upfile);

    if(errocheckflag == 0){
        const form = new FormData(formdocfiles);
        form.append("action","adddoc");
        // const urlparams = new URLSearchParams(form);

        console.log(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST",""+ROOT+"/Itemowner/ViewItem/addDocumentaions");
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
        formdocfiles.reset();
        ajax_loadDocumentation();
    }
}

