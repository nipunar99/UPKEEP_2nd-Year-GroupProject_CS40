// "use strict";
//
document.addEventListener("DOMContentLoaded",function(){ajax_getAllReminders()});
//

// Get all DOM and store in variable
const modal = document.querySelector(".popupview");
const overlay = document.querySelector(".overlayview");
const btnCloseModal = document.querySelector(".closebtn");
const btnShowModal1 = document.querySelector(".show-modal1");
const btnShowModal2 = document.querySelector(".show-modal2");
const btnShowModal3 = document.querySelector(".show-modal3");


// Show Modal function const showModal
const showModal = function () {
    console.log("button clicked");
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
};


// show modal click event
btnShowModal1.addEventListener("click", showModal);
btnShowModal2.addEventListener("click", showModal);
btnShowModal3.addEventListener("click", showModal);



// close modal click
btnCloseModal.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);


//................................................................

function ajax_getAllReminders() {
    console.log("ajax_getAllReminders");
    const xhr = new XMLHttpRequest();

    xhr.open('GET',"http://localhost/upkeep/upkeep/public/Itemowner/Userdashboard/getAllReminders");

    xhr.onload = function () {
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);

            var html="";
            for(var i=0; i<json.length; i++){
                html+= "<div class='maintenceBox show-modal1' role='button'><h3>Maintenance Schedule</h3>";   
                html+= "<div><div class='middle'>";   
                html+= "<div><span class='material-icons-sharp'>chat_bubble_outline</span><h4>"+json[i].description+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>calendar_today</span>";
                html+= "<h4>"+json[i].start_date+"</h4></div>";
                html+= "<div><span class='material-icons-sharp'>construction</span><h4>"+json[i].sub_component+"</h4></div>";
                html+= "<div class='maintenanceStatus'><span class='material-icons-sharp'>error_outline</span>";
                html+= "<h4>Pending</h4></div></div>";
                html+= "<img src='http://localhost/UpKeep/upkeep/public/assets/images/uploads/"+json[i].image+"'></div></div>";
            }
            document.querySelector(".maintenceBoxes").innerHTML=html;
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
