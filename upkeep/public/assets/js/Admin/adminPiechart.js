document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chart").getContext("2d");
    
    // Dummy data for demonstration
    var data = {
      labels: ["Admins", "Moderators", "Banned Admins"],
      datasets: [{
        data: [30, 20, 15, 10, 25],
        backgroundColor: ["#FFCE56", "#4BC0C0", "#E7E9ED"]
      }]
    };
    
    var options = {
      responsive: true,
      maintainAspectRatio: false
    };
  
    var chart = new Chart(ctx, {
      type: 'pie',
      data: data,
      options: options
    });
  });
  