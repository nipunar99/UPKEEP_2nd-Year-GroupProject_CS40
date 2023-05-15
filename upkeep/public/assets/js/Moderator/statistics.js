const currentDate = new Date();
const dateString = currentDate.toDateString();

document.addEventListener("DOMContentLoaded", function () {
    ajax_usersView();
    ajax_statisticView();
    ajax_adminstrativeUsers();
    ajax_getItems();
    ajax_getItemSuggestions();
});

var totalItems,totalPending;
function ajax_statisticView() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "" + ROOT + "/Moderator/Statistics/itemView", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            totalItems = json.total_templates;
            totalPending = json.pending_templates;
            var total = parseInt(totalItems) +parseInt(totalPending);
            var html = "";



            // html += "<div class='text'>";
            html += "<div class='text-1'>";
            html += "<p>Total Templates</p>";
            html += "<h1>";
            html += "" + total + "</h1>";
            html += `<p>${dateString}</p>`;
            html += " </div>";
            html += "<div class='text-2'>";
            html += "<p>Item Templates " + json.total_templates + "</p>";
            html += "<p>";
            html += "Pending Items " + json.pending_templates + "</p>";
            html += " </div>";

         
            document.querySelector(".card-2 .text").innerHTML = html;
          
            const ctx = document.getElementById('pieChart2');
            const data = {

                datasets: [{
                    data: [totalItems, totalPending],
                    backgroundColor: [
                        'rgb(255, 51, 255)',
                        'rgb(54, 162, 235)'

                    ],
                    hoverOffset: 4
                }],
                // labels: [
                //     'Item Templates',
                //     'Pending Items',

                // ]
            };


            new Chart(ctx, {
                type: 'pie',
                data: data,
            })
        }

    }
    xhr.send();


}
var totalUsers, itemUsers,technicians,bannedAccount;
function ajax_usersView() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "" + ROOT + "/Moderator/Statistics/userView", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            itemUsers = json.item_owners;
            technicians = json.technicians;
            totalUsers =parseInt(itemUsers) +parseInt(technicians);
            var html = "";



            // html += "<div class='text'>";
            html += "<div class='text-1'>";
            html += "<p>Total Users</p>";
            html += "<h1>";
            html += "" + totalUsers + "</h1>";
            html += `<p>${dateString}</p>`;
            html += " </div>";
            html += "<div class='text-2'>";
            html += "<p>Technicians " + json.technicians + "</p>";
            html += "<p>";
            html += "Item Owners " + json.item_owners + "</p>";
            html += " </div>";

         
            document.querySelector(".card-1 .text").innerHTML = html;
          
            const ctx = document.getElementById('pieChart1');
            const data = {

                datasets: [{
                    data: [itemUsers, technicians],
                    backgroundColor: [
                        'rgb(255, 51, 255)',
                        'rgb(54, 162, 235)'

                    ],
                    hoverOffset: 4
                }],
                // labels: [
                //     'Item Templates',
                //     'Pending Items',

                // ]
            };


            new Chart(ctx, {
                type: 'pie',
                data: data,
            })
        }

    }
    xhr.send();


}
var totalAdminstrartiveusers, admins,moderators;
function ajax_adminstrativeUsers(){
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "" + ROOT + "/Moderator/Statistics/adminView", "true");
    console.log(xhr);
    xhr.onload = function () {
        if (xhr.status == 200) {
            const res = xhr.responseText;
            const json = JSON.parse(res);
            admins = json. admin;
            moderators = json.moderator;
            totalUsers =parseInt(admins) +parseInt(moderators);
            var html = "";



            // html += "<div class='text'>";
            html += "<div class='text-1'>";
            html += "<p>Administrative Users</p>";
            html += "<h1>";
            html += "" + totalUsers + "</h1>";
            html += `<p>${dateString}</p>`;
            html += " </div>";
            html += "<div class='text-2'>";
            html += "<p>Moderators " + json.moderator + "</p>";
            html += "<p>";
            html += "Admins " + json.admin + "</p>";
            html += " </div>";

         
            document.querySelector(".card-3 .text").innerHTML = html;
          
            const ctx = document.getElementById('pieChart3');
            const data = {

                datasets: [{
                    data: [moderators, admins],
                    backgroundColor: [
                        'rgb(255, 51, 255)',
                        'rgb(54, 162, 235)'

                    ],
                    hoverOffset: 4
                }],
                // labels: [
                //     'Item Templates',
                //     'Pending Items',

                // ]
            };


            new Chart(ctx, {
                type: 'pie',
                data: data,
            })
        }

    }
    xhr.send();


}
const item = new Array(7).fill(0);

function ajax_getItems() {
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "" + ROOT + "/Moderator/Statistics/itemCategoryView");

  xhr.onload = function() {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      const json = JSON.parse(res);
      console.log(json);

      json.forEach(function(viewItem) {
        item[viewItem.category] = parseInt(viewItem.total_item);
      });
console.log(item);
const dataValues = json.map(item => parseInt(item.total_item));
console.log(dataValues); // [6, 1, 3, 1, 2, 1, 1]

      const ctx1 = document.getElementById('barChart');
      new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['Electronics', 'Appliances', 'Tools and equipment', 'Vehicles', 'Furniture', 'Home and Garden', 'Other'],
          datasets: [{
            // label: '# of Votes',
            data: dataValues,
            backgroundColor: [
              'rgba(153, 51, 255, 0.2)',
              'rgba(0, 128, 255, 0.2)',
              'rgba(102, 178, 255, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 51, 255)',
              'rgb(0, 128, 255)',
              'rgb(0, 128, 255)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                offset: true
              },
            },
            x: {
              grid: {
                offset: true
              }
            }

          }
        }
      });
    }
  }

  xhr.send();
}

const item_suggestions = new Array(7).fill(0);

function ajax_getItemSuggestions() {
  const xhr = new XMLHttpRequest();

  xhr.open("GET", "" + ROOT + "/Moderator/Statistics/itemSuggestionsCategoryView");

  xhr.onload = function() {
    if (xhr.status == 200) {
      const res = xhr.responseText;
      const json = JSON.parse(res);
      console.log(json);

      json.forEach(function(viewItemSuggestions) {
        item_suggestions[viewItemSuggestions.category] = parseInt(viewItemSuggestions.total_item);
      });
console.log(item_suggestions);
const dataValues = json.map(item_suggestions => parseInt(item_suggestions.total_item));
console.log(dataValues); // [6, 1, 3, 1, 2, 1, 1]

      const ctx1 = document.getElementById('barChart-2');
      new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['Electronics', 'Appliances', 'Tools and equipment', 'Vehicles', 'Furniture', 'Home and Garden', 'Other'],
          datasets: [{
            // label: '# of Votes',
            data: dataValues,
            backgroundColor: [
              'rgba(153, 51, 255, 0.2)',
              'rgba(0, 128, 255, 0.2)',
              'rgba(102, 178, 255, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 51, 255)',
              'rgb(0, 128, 255)',
              'rgb(0, 128, 255)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              grid: {
                offset: true
              },
            },
            x: {
              grid: {
                offset: true
              }
            }

          }
        }
      });
    }
  }

  xhr.send();
}
