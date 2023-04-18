// importent global variables
let deleteTaskNum = "";
let reminderid = ""; 
let submintFormNum = "";
var firstIndex = 0;



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
menuBtn
document.addEventListener("DOMContentLoaded",function(){
    ajax_getAllReminders();
    ajax_getAllOverdueReminders();
    display1details();
    display2details();
    display3details();
});

//
function ajax_getAllReminders() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',""+ROOT+"/Itemowner/Userdashboard/getAllReminders");

    xhr.onload = function () {
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            var html="";
            var i= 0;
            for( i=0; i<json.length; i++){
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
                html+= "<div class='action_btn'><button class='confirmbtn' onclick='completeTask("+(i+1)+")'>Complete</button> <button>Edit</button> <button class='deletebtn' id='deletebtn"+(i+1)+"' onclick='deleteTask("+(i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

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
                html+= "            <input type='button' value='Done' class='completeTaskbtn confirmbtn action_btn'>";       
                html+= "        </div>";
                html+= "</form>";
                html+= "<div class='action_btn'>";
                html+= "    <button onclick='cancelcompleteTask("+(i+1)+")' class='cancelbtn'>Cancel</button>";
                html+= "</div> </div>";
                html+= "</div>";
            }
            document.querySelector(".maintenceBoxes").innerHTML=html;
            firstIndex = i;
        }

    }
    xhr.send();
}

function ajax_getAllOverdueReminders() {
    const xhr = new XMLHttpRequest();

    xhr.open('GET',""+ROOT+"/Itemowner/Userdashboard/getAllOverdueReminders");

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
                html+= "<div class='action_btn'><button class='confirmbtn' onclick='completeTask("+(firstIndex+i+1)+")'>Complete</button> <button>Edit</button> <button class='deletebtn' id='deletebtn"+(firstIndex+i+1)+"' onclick='deleteTask("+(firstIndex+i+1)+","+json[i].reminder_id+")'>Delete</button> </div> </div>";

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


// Get all DOM and store in variable
const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnShowModal1 = document.querySelector(".show-modal1");
const btnShowModal2 = document.querySelector(".show-modal2");
const btnShowModal3 = document.querySelector(".show-modal3");

document.querySelector("#addMaintenancebtn").addEventListener("click", ajax_completeTask);


// Show Modal function const showModal
const showModal = function () {
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");    
    // removeEvent();
};

//call Ajax functions 
// completebtn.addEventListener("click", ajax_completeTask);

// show modal click event
// btnShowModal1.addEventListener("click", showModal);
// btnShowModal2.addEventListener("click", showModal);
// btnShowModal3.addEventListener("click", showModal);



// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);


//................................................................

function submitTask(number){
    submintFormNum = number;
    ajax_completeTask();
    document.getElementById("deletebtn"+submintFormNum+"").click();
}

//........................................................................
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
//.............................Delete Task...........................................



function deleteTask(number,id){
    deleteTaskNum = number;
    reminderid = id;
    ajax_deleteTask();
    ajax_getAllReminders();
    ajax_getAllOverdueReminders();
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
//....................................................................................

function display1details(){
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/Userdashboard/display1details");

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

    xhr.open("GET",""+ROOT+"/Itemowner/Userdashboard/display2details");

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
    const xhr = new XMLHttpRequest();

    xhr.open("GET",""+ROOT+"/Itemowner/Userdashboard/display3details");

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



let element= "";

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













//............................calender Script.....................................................

const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();
// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July","August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";
    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }
    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }
    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}

renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth);
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});












// escape click event
// document.addEventListener("keydown", function (e) {
//     if (e.key === "Escape" && !modal.classList.contains("hidden")) {
//         closeModal();
//     }
// });
