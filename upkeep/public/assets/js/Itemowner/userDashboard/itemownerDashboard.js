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
document.addEventListener("DOMContentLoaded",function(){
    ajax_getAllReminders();
    ajax_getAllOverdueReminders();
    display1details();
    display2details();
    display3details();
});


// Get all DOM and store in variable
const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnShowModal1 = document.querySelector(".show-modal1");
const btnShowModal2 = document.querySelector(".show-modal2");
const btnShowModal3 = document.querySelector(".show-modal3");

// document.querySelector("#addMaintenancebtn").addEventListener("click", ajax_completeTask);


// Show Modal function const showModal
const showModal = function () {
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    // overlay.classList.remove("show");    
    // removeEvent();
};

// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);


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
