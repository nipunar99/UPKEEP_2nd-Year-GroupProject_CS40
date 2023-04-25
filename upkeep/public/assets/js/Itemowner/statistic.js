
/////////////////////// Add maintenance form constraints...............

document.addEventListener("DOMContentLoaded",function(){
  display1details();
});
//////////////////////////////////////////////

// Bar chart
const ctx1 = document.getElementById('barChat');

  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels:['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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


function display1details(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/display1Details");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          console.log(json[0].total_cost);
          var html = "";
          html += "<span>Rs.</span><span >"+json[0].total_cost+"</span>";
          document.querySelector(".total_cost").innerHTML = html;
      }
  }
  xhr.send();

}

function display2details(){
  const xhr = new XMLHttpRequest();

  xhr.open("GET",""+ROOT+"/Itemowner/Statistic/display1Details");

  xhr.onload = function(){
      if(xhr.status == 200){
          const res = xhr.responseText;
          const json = JSON.parse(res);
          console.log(json[0].total_cost);
          var html = "";
          html += "<span>Rs.</span><span >"+json[0].total_cost+"</span>";
          document.querySelector(".total_cost").innerHTML = html;
      }
  }
  xhr.send();

}