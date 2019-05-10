// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Male", "Female"],
    datasets: [{
      data: [55, 45],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, data) {
          var dataset =  data.datasets[tooltipItem.datasetIndex];
          var currentvalue = dataset.data[tooltipItem.index];
          return currentvalue +"%";
        }
      }
    },
    legend: {
      display: true
    },
    cutoutPercentage: 80,
  },
});

var ctxs = document.getElementById("age");
var age = new Chart(ctxs, {
  type: 'pie',
  data: {
    labels: ["17-26", "26-35"],
    datasets: [{
      data: [55, 45],
      backgroundColor: ['#4e73df', '#1cc88a'],
      hoverBackgroundColor: ['#2e59d9', '#17a673'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, data) {
          var dataset =  data.datasets[tooltipItem.datasetIndex];
          var currentvalue = dataset.data[tooltipItem.index];
          return currentvalue +"%";
        }
      }
    },
    legend: {
      display: true
    },
    cutoutPercentage: 0,
  },
});
