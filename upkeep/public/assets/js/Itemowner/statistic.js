
/////////////////////// Add maintenance form constraints...............
// var monthCost=null;
document.addEventListener("DOMContentLoaded",function(){
  display1details();
  display3details();
  display4details();
  barchartDetails();
  piechartDetails();
  paymentHistoryDetails();
  DisposeItemsDetails();
  ItemsDetails();
  maintenanceHistoryDetails();
});

function display1details(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/display1Details");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          var html = "";
          html += "<span>Rs.</span><span >"+json[0].total_cost+"</span>";
          document.querySelector(".total_cost").innerHTML = html;
      }
  }
  xhr.send();

}

function display3details(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/display3Details");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          console.log(res);
          const json = JSON.parse(res);
          var html = "";
          html += "<span >"+json[0].dispose_count+"</span>";
          document.querySelector(".dispose_itemCount").innerHTML = html;
      }
  }
  xhr.send();

}

function display4details(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/display4Details");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          // const json = JSON.parse(res);
          // var html = "";
          // html += "<span >"+json[0].dispose_count+"</span>";
          // document.querySelector(".dispose_item").innerHTML = html;
      }
  }
  xhr.send();
}

//////////////////////////////////////////////
var cst = Array(12).fill(0);
var i=0;
function barchartDetails(){

  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/barchartDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          setMonthCost(json);
      }

  }
  xhr.send();
}

var m1 =0,m2 =0,m3 =0,m4 =0,m5 =0,m6 =0,m7 =0,m8 =0,m9 =0,m10 =0,m11 =0,m12 =0;
function setMonthCost(monthCost) {
  monthCost.forEach(function(costMonth) {
    // cst[costMonth.month-1]=parseInt(costMonth.total_cost);
      switch (costMonth.month-1) {
        case 0:
          m1 = parseInt(costMonth.total_cost);
          break;
        case 1:
          m2 = parseInt(costMonth.total_cost);
          break;
        case 2:
          m3 = parseInt(costMonth.total_cost);
          break;
        case 3:
          m4 = parseInt(costMonth.total_cost);
          break;
        case 4:
          m5 = parseInt(costMonth.total_cost);
          break;
        case 5:
          m6 = parseInt(costMonth.total_cost);
          break;
        case 6:
          m7 = parseInt(costMonth.total_cost);
          break;
        case 7:
          m8 = parseInt(costMonth.total_cost);
          break;
        case 8:
          m9 = parseInt(costMonth.total_cost);
          break;
        case 9:
          m10 = parseInt(costMonth.total_cost);
          break;
        case 10:
          m11 = parseInt(costMonth.total_cost);
          break;
        case 11:
          m12 = parseInt(costMonth.total_cost);
          break;
      }
    
  });
  var dt =[m1,m2,m3,m4,m5,m6,m7,m8,m9,m10,m11,m12];
  generateBarchart(dt);

}

function generateBarchart(dt){
  const ctx1 = document.getElementById('barChat');
  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels:['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: '# of Votes',
        data:dt,
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
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


//..............................................................................................



function piechartDetails(){

  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/piechartDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          var dt =[json.complete,json.incomplete,json.overdue];
          generatePiechart(dt);
      }

  }
  xhr.send();
}

//   pie chart
function generatePiechart(dt){
  const ctx2 = document.getElementById('pieChart');
  const data2 = {
      labels: [
        'Completed ',
        'Incomplete',
        'Overdue  '
      ],
      datasets: [{
        label: 'My First Dataset',
        data:dt,
        backgroundColor: [
          'rgba(0,149,217,0.7)',
          'rgba(0,190,228,0.5)',
          'rgb(128,128,128,0.5)'
        ],
        hoverOffset: 4
      }]
  };

  new Chart(ctx2, {
      type: 'polarArea',
      data: data2,
  });
}


//..............................................................................................

function paymentHistoryDetails(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/paymentHistoryDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);

          var html = "<h2>Payment Histroy</h2>";
          
          if (json.status != "empty"){
            for(var i=0; i<json.length; i++){
              html += "<div>";
              html += "              <div class='profile-photo'>";
              html += "                  <img src='"+ROOT+"/assets/images/profile-2.jpg' alt=''>";
              html += "              </div>";
              html += "              <div class='left'>";
              html += "                  <h3>"+json[i].full_name+"</h3>";
              html += "                  <h3><span>Rs.</span><span>"+json[i].service_charge+"</span></h3>";
              html += "              </div>";
              html += "         </div>";
            }
          }else{
              html += "<h2>No data available</h2>";
          }
          
          document.querySelector(".paymentHistory").innerHTML = html;

          // var html = "";
          // html += "<span >"+json[0].dispose_count+"</span>";
          // document.querySelector(".dispose_item").innerHTML = html;
      }
  }
  xhr.send();
}

function maintenanceHistoryDetails(form){
  const xhr = new XMLHttpRequest();

  xhr.open("POST",""+ROOT+"/Itemowner/Statistic/maintenanceHistoryDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);

          var html = "";
          
          if (json.status != "empty"){
            for(var i=0; i<json.length; i++){
              html += "<tr>";
              html += "<td>"+json[i].description+"</td>"
              html += "<td class='danger'>"+json[i].cost+"</td>"
              html += "<td class='warning'>"+json[i].finished_date+"</td>"
              html += "</tr>";
            }
          }else{
              html += "<h2>No data available</h2>";
          }
          
          document.querySelector(".maintenanceHistoryDetails").innerHTML = html;
      }
  }
  xhr.send(form);
}

function DisposeItemsDetails(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/getAllDisposeItem");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);

          var html = "";
          
          if (json.status != "empty"){
            for(var i=0; i<json.length; i++){
              html += "<tr>";
              html += "<td><img src='"+ROOT+"/assets/images/uploads/"+json[i].image+"' alt=''></td>"//image
              html += "<td class='success'>"+json[i].item_type+"</td>"//category
              html += "<td>"+json[i].item_name+"</td>"//Item name
              html += "<td class='danger'>"+json[i].dispose_date+"</td>"// Despose Date
              html += "</tr>";
            }
          }else{
              html += "<h2>No data available</h2>";
          }
          
          document.querySelector(".disposeItemsDetails").innerHTML = html;

          var html = "";
          html += "<span >"+json[0].dispose_count+"</span>";
          // document.querySelector(".dispose_item").innerHTML = html;
      }
  }
  xhr.send();
}


function ItemsDetails(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/getAllItem");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);

          if (json.status != "empty"){
            loadItemToMaintenanceHistory(json);
          }else{
          }

      }
  }
  xhr.send();
}

function loadItemToMaintenanceHistory(json){
  itemSelector = document.getElementById("itemSelector");
  monthyearinput = document.getElementById("month-year-input");

  var itemDetails = [];
  for (var i = 0; i < json.length; i++) {
    itemDetails.push(json[i].item_name);
  }

  loadDataToSelector(itemDetails,itemSelector);
  itemSelector.value ='';
  itemSelector.addEventListener('change', function() { //Change event Listener
      for (var a = 0; a < json.length; a++) {
          if (itemSelector.value === json[a].item_name) {
            const form = new FormData();
            form.append("item_id",json[a].item_id);
            maintenanceHistoryDetails(form);
          }
      }
    });

    monthyearinput.addEventListener('change', function() { //Change event Listener
      const form = new FormData();
      form.append("date_month",monthyearinput.value);
      maintenanceHistoryDetails(form);
      console.log(monthyearinput.value);
    });
}
