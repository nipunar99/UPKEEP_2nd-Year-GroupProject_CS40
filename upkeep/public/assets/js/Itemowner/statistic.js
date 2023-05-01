
/////////////////////// Add maintenance form constraints...............

document.addEventListener("DOMContentLoaded",function(){
  display1details();
  display3details();
  display4details();
  barchartDetails();
  piechartDetails();
  paymentHistoryDetails();
  maintenanceHistoryDetails();
  DisposeItemsDetails();
});

function display1details(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/display1Details");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          // console.log(json[0].total_cost);
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
          const json = JSON.parse(res);
          console.log(json[0].dispose_count);
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
          // console.log(json[0].dispose_count);
          // var html = "";
          // html += "<span >"+json[0].dispose_count+"</span>";
          // document.querySelector(".dispose_item").innerHTML = html;
      }
  }
  xhr.send();
}

//////////////////////////////////////////////
const cost = new Array(12).fill(0);
function barchartDetails(){

  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/barchartDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          console.log(json);

          json.forEach(function(costMonth) {
            cost[costMonth.month]=parseInt(costMonth.total_cost);
          });
      }

  }
  xhr.send();
}


// Bar chart
var k =10;
var dt =[4,6,2];
console.log(dt);
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

//..............................................................................................



function piechartDetails(){

  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/piechartDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          // console.log(json.complete);  
      }

  }
  xhr.send();
}

//   pie chart

const ctx2 = document.getElementById('pieChart');
const data2 = {
    labels: [
      'Completed ',
      'Incomplete',
      'Overdue  '
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300,200,400],
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


//..............................................................................................

function paymentHistoryDetails(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/paymentHistoryDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          // console.log(json);

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

function maintenanceHistoryDetails(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/maintenanceHistoryDetails");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          console.log(json);

          var html = "";
          
          if (json.status != "empty"){
            for(var i=0; i<json.length; i++){
              html += "<tr>";
              html += "<td>"+json[0].description+"</td>"
              html += "<td class='danger'>"+json[0].cost+"</td>"
              html += "<td class='warning'>"+json[0].finished_date+"</td>"
              html += "</tr>";
            }
          }else{
              html += "<h2>No data available</h2>";
          }
          
          document.querySelector(".maintenanceHistoryDetails").innerHTML = html;
      }
  }
  xhr.send();
}

function DisposeItemsDetails(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/getAllDisposeItem");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          console.log(json);

          var html = "";
          
          if (json.status != "empty"){
            for(var i=0; i<json.length; i++){
              html += "<tr>";
              html += "<td><img src='"+ROOT+"/assets/images/uploads/"+json[0].image+"' alt=''></td>"//image
              html += "<td class='success'>"+json[0].item_type+"</td>"//category
              html += "<td>"+json[0].item_name+"</td>"//Item name
              html += "<td class='danger'>"+json[0].dispose_date+"</td>"// Despose Date
              html += "</tr>";
            }
          }else{
              html += "<h2>No data available</h2>";
          }
          
          document.querySelector(".disposeItemsDetails").innerHTML = html;

          var html = "";
          html += "<span >"+json[0].dispose_count+"</span>";
          document.querySelector(".dispose_item").innerHTML = html;
      }
  }
  xhr.send();
}

