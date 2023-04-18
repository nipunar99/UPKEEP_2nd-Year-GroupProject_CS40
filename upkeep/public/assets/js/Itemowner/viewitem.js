var disposalPlacesjson = null;
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
const docsbtn =  document.querySelector(".docbtn");

const itempannelbtn =  document.querySelector(".itempannelbtn");
const itempannel = document.querySelector(".right");
const itempannelclosebtn = document.querySelector(".itempannelclosebtn");

const closeMapebtn = document.querySelector("#closeMap");

const allMaintenance = document.querySelector(".morebtn");
const disposeguide = document.querySelector(".disposebtn");
const main1 = document.querySelector(".main1");
const main2 = document.querySelector(".main2");
const main3 = document.querySelector(".main3");
const right = document.querySelector(".right");
const container = document.querySelector(".container");
const backbtn = document.querySelector(".back");
const backbtn2 = document.querySelector(".back2");

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
reminderbtn.addEventListener("click",addreminder);
maintenancebtn.addEventListener("click",ajax_addMaintenance);
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
backbtn.addEventListener("click", () => {
    main1.classList.remove("hidden");
    right.classList.remove("hidden");
    main2.classList.add("hidden");
    main3.classList.add("hidden");
    container.classList.remove("newgrid-container");
});

backbtn2.addEventListener("click", () => {
    main1.classList.remove("hidden");
    right.classList.remove("hidden");
    main3.classList.add("hidden");
    container.classList.remove("newgrid-container");
});
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
                html+= "<h2 id='itemid'style='display: none;'>"+json[i].item_id+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[i].start_date+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3><h2>"+json[i].sub_component+"</h2></div>";
                html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h3>Pending</h3></div></div>";
                html+= "<div class='action_btn'><button class='complete' onclick='completeTask("+(i+1)+")'>Complete</button> <button class='edit' >Edit</button> <button class='cancel' id='deletebtn"+(i+1)+"' onclick='deleteTask("+(i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

                html+= "<div class='completeform"+(i+1)+" hidden'>";
                html+= "<form method='post' id='form_completeTask"+(i+1)+"'>";
                html+= "    <h2>Maintenance Details</h2>";
                html+= "        <div class='middleInput'>";
                html+= "            <div class='input-box'>";
                html+= "            <span class='details'>Summary of Maintenance</span>";
                html+= "                <input type='text' name='task_description' id='' required  placeholder='Enter Summary'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Complete Date</span>";
                html+= "                <input type='date'  name='finished_date' required  placeholder='Enter complete date'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Cost for Maintenance</span>";
                html+= "                <input type='number' min='0' name='cost'  placeholder='Enter Brand'>";
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
}

function ajax_getAllOverdueReminders() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',""+ROOT+"/Itemowner/ViewItem/getAllOverdueReminders");

    xhr.onload = function () {
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
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
                html+= "<h2 id='itemid'style='display: none;'>"+json[i].item_id+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span><h3>Due date</h3><h2>"+json[i].start_date+"</h2></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h3>Sub component</h3><h2>"+json[i].sub_component+"</h2></div>";
                html+= "<div class='maintenanceStatus danger'><span class='material-icons-sharp'>error_outline</span><h3>Pending</h3></div></div>";
                html+= "<div class='action_btn'><button onclick='completeTask("+(firstIndex+i+1)+")'>Complete</button> <button>Edit</button> <button id='deletebtn"+(firstIndex+i+1)+"' onclick='deleteTask("+(firstIndex+i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

                html+= "<div class='completeform"+(firstIndex+i+1)+" hidden'>";
                html+= "<form method='post' id='form_completeTask"+(firstIndex+i+1)+"'>";
                html+= "    <h2>Maintenance Details</h2>";
                html+= "        <div class='middleInput'>";
                html+= "            <div class='input-box'>";
                html+= "            <span class='details'>Summary of Maintenance</span>";
                html+= "                <input type='text' name='task_description' id='' required  placeholder='Enter Summary'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Complete Date</span>";
                html+= "                <input type='date'  name='finished_date' required  placeholder='Enter complete date'>";
                html+= "            </div>";
                html+= "            <div class='input-box'>";
                html+= "                <span class='details'>Cost for Maintenance</span>";
                html+= "                <input type='number' min='0' name='cost'  placeholder='Enter Brand'>";
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

// Ajax for the add Maintenance
function ajax_addMaintenance(e){
    e.preventDefault();

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


function ajax_getAllMaintenance(){

    const xhr = new XMLHttpRequest();
    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/getAllMaintenance");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
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
                        html +="<td class='success'>"+json[a].status+"</td>";
                        html +="<td class='primary test'>Action</td></tr>";


                }
            }
            
            document.querySelector(".maintenanceListTbody").innerHTML = html;
        }
    }

    xhr.send();
}


// Ajax for the get latest maintenance for the display 1

function display1details(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/display1details");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
            console.log(json.length);
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
            console.log("display2details");
            console.log(json);
            // console.log(json.length);
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
    console.log("display1details");

    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/ViewItem/display3details");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log("display3details");
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
    document.getElementById("deletebtn"+submintFormNum+"").click();
}

//............................................................................

function ajax_completeTask() {
    const formCompleteDetails = document.getElementById("form_completeTask"+submintFormNum+"");
    const itemid = document.getElementById("itemid").innerHTML;

    const form = new FormData(formCompleteDetails);
    form.append("action", "completeTask");
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
