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




/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").classList.remove('hidden');
    // document.getElementById('overlay').classList.remove('hidden');
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").classList.add('hidden');
    // document.getElementById('overlay').classList.add('hidden');
}




//charts
piechart_data = JSON.parse(piechart_data);
barchart_data = JSON.parse(barchart_data);
// console.log(barchart_data);

//dunction to check if month exist in barchart_data and returns it's index
function checkMonth(month) {
    for (let i = 1; i <= barchart_data.length; i++) {
        if (barchart_data[i-1].month == month) {
            // console.log(barchart_data[i].month)
            return i;
        }
    }
    return false;
}

//prepare data for bar chart from barchart_data 2 arrays 1st to labels and 2nd to data. lables = 6 monnths back from the current month and data = 6 months income 6 months should be created even if there is no income
bar_data = []
bar_labels = []
month_labels = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL','AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
var thismonth = new Date().getMonth();
for (let i = 5; i >= 0; i--) {
    var month = thismonth - i;
    if (month < 0) {
        month = 12 + month;
    }

    index = checkMonth(month+1);
    // console.log(index);
    if(index){
       bar_data.push(barchart_data[index-1].revenue);
    }else{
        bar_data.push(0);
    }
    bar_labels.push(month_labels[month]);
}
// console.log(bar_labels);
// console.log(bar_data)



var donutChart = new Chart(document.getElementById('donut-chart'), {
    type: 'doughnut',
    data: {
        labels: ['Completed', 'In Queue', 'Canceled'],
        datasets: [
            {
                data: [piechart_data.completed, piechart_data.pending, piechart_data.cancelled, ],
                backgroundColor: ['#4BC0C0', '#FFCE56', '#FF6384'],
                hoverBackgroundColor: ['#4BC0C0', '#FFCE56', '#FF6384']
            }
        ]
    },
    options: {
        responsive: true,
        legend: {
            display: true,
            position: 'right'
        },
        title: {
            display: true,
            text: 'Orders Status'
        },
        animation: {
            animateScale: true,
            animateRotate: true
        },
        // set size for the chart
        width: 400,
        height: 400,
        plugins: {
            legend: {

            }
        }
    }
});



var barChart = new Chart(document.getElementById('bar-chart'), {
    type: 'line',
    data: {
        labels: bar_labels,
        datasets: [
            {
                label: 'Monthly Income',
                data: bar_data,
                backgroundColor: '#36A2EB',
                borderColor: '#36A2EB',
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Monthly Income'
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    offset: true
                },
            },
            x: {
                beginAtZero: true,
                grid: {
                    offset: true
                }
            }

        },

        maintainAspectRatio: false,
    }
});




