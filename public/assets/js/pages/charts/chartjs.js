var draw = Chart.controllers.line.prototype.draw;
Chart.controllers.lineShadow = Chart.controllers.line.extend({
  draw: function () {
    draw.apply(this, arguments);
    var ctx = this.chart.chart.ctx;
    var _stroke = ctx.stroke;
    ctx.stroke = function () {
      ctx.save();
      ctx.shadowColor = "#00000075";
      ctx.shadowBlur = 10;
      ctx.shadowOffsetX = 8;
      ctx.shadowOffsetY = 8;
      _stroke.apply(this, arguments);
      ctx.restore();
    };
  },
});

try {
  //Sales chart
  var ctx = document.getElementById("line-chart");
  if (ctx) {
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: "lineShadow",
      data: {
        labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
        type: "line",
        defaultFontFamily: "Poppins",
        datasets: [
          {
            label: "Foods",
            data: [0, 30, 10, 120, 50, 63, 10],
            backgroundColor: "transparent",
            borderColor: "#222222",
            borderWidth: 2,
            pointStyle: "circle",
            pointRadius: 3,
            pointBorderColor: "transparent",
            pointBackgroundColor: "#222222",
          },
          {
            label: "Electronics",
            data: [0, 50, 40, 80, 40, 79, 120],
            backgroundColor: "transparent",
            borderColor: "#f96332",
            borderWidth: 2,
            pointStyle: "circle",
            pointRadius: 3,
            pointBorderColor: "transparent",
            pointBackgroundColor: "#f96332",
          },
        ],
      },
      options: {
        responsive: true,
        tooltips: {
          mode: "index",
          titleFontSize: 12,
          titleFontColor: "#000",
          bodyFontColor: "#000",
          backgroundColor: "#fff",
          titleFontFamily: "Poppins",
          bodyFontFamily: "Poppins",
          cornerRadius: 3,
          intersect: false,
        },
        legend: {
          display: false,
          labels: {
            usePointStyle: true,
            fontFamily: "Poppins",
          },
        },
        scales: {
          xAxes: [
            {
              display: true,
              gridLines: {
                display: false,
                drawBorder: false,
              },
              scaleLabel: {
                display: false,
                labelString: "Month",
              },
              ticks: {
                fontFamily: "Poppins",
                fontColor: "#9aa0ac", // Font Color
              },
            },
          ],
          yAxes: [
            {
              display: true,
              gridLines: {
                display: false,
                drawBorder: false,
              },
              scaleLabel: {
                display: true,
                labelString: "Value",
                fontFamily: "Poppins",
              },
              ticks: {
                fontFamily: "Poppins",
                fontColor: "#9aa0ac", // Font Color
              },
            },
          ],
        },
        title: {
          display: false,
          text: "Normal Legend",
        },
      },
    });
  }
} catch (error) {
  console.log(error);
}

try {
  //line chart
  var ctx = document.getElementById("lineChartFill");
  if (ctx) {
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],
        defaultFontFamily: "Poppins",
        datasets: [
          {
            label: "My First dataset",
            borderColor: "rgba(0,0,0,.09)",
            borderWidth: "1",
            backgroundColor: "rgba(0,0,0,.07)",
            data: [22, 44, 67, 43, 76, 45, 12],
          },
          {
            label: "My Second dataset",
            borderColor: "rgba(0, 123, 255, 0.9)",
            borderWidth: "1",
            backgroundColor: "rgba(0, 123, 255, 0.5)",
            pointHighlightStroke: "rgba(26,179,148,1)",
            data: [16, 32, 18, 26, 42, 33, 44],
          },
        ],
      },
      options: {
        legend: {
          position: "top",
          labels: {
            fontFamily: "Poppins",
          },
        },
        responsive: true,
        tooltips: {
          mode: "index",
          intersect: false,
        },
        hover: {
          mode: "nearest",
          intersect: true,
        },
        scales: {
          xAxes: [
            {
              ticks: {
                fontFamily: "Poppins",
                fontColor: "#9aa0ac", // Font Color
              },
            },
          ],
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins",
                fontColor: "#9aa0ac", // Font Color
              },
            },
          ],
        },
      },
    });
  }
} catch (error) {
  console.log(error);
}
try {
  //bar chart
  var ctx = document.getElementById("bar-chart");
  if (ctx) {
    ctx.height = 200;
    var myChart = new Chart(ctx, {
      type: "bar",
      defaultFontFamily: "Poppins",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],
        datasets: [
          {
            label: "My First dataset",
            data: [65, 59, 80, 81, 56, 55, 40],
            borderColor: "rgba(109, 144, 232,1)",
            borderWidth: "0",
            backgroundColor: "rgba(109, 144, 232, 0.8)",
            fontFamily: "Poppins",
          },
          {
            label: "My Second dataset",
            data: [28, 48, 40, 19, 86, 27, 90],
            borderColor: "rgba(255, 140, 96,1)",
            borderWidth: "0",
            backgroundColor: "rgba(255, 140, 96, 0.8)",
            fontFamily: "Poppins",
          },
        ],
      },
      options: {
        legend: {
          position: "top",
          labels: {
            fontFamily: "Poppins",
            fontColor: "#9aa0ac",
          },
        },
        scales: {
          xAxes: [
            {
              ticks: {
                fontFamily: "Poppins",
                fontColor: "#9aa0ac", // Font Color
              },
            },
          ],
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins",
                fontColor: "#9aa0ac", // Font Color
              },
            },
          ],
        },
      },
    });
  }
} catch (error) {
  console.log(error);
}

try {
  //radar chart
  var ctx = document.getElementById("radar-chart");
  if (ctx) {
    ctx.height = 200;
    var myChart = new Chart(ctx, {
      type: "radar",
      data: {
        labels: [
          ["Eating", "Dinner"],
          ["Drinking", "Water"],
          "Sleeping",
          ["Designing", "Graphics"],
          "Coding",
          "Cycling",
          "Running",
        ],
        defaultFontFamily: "Poppins",
        datasets: [
          {
            label: "My First dataset",
            data: [65, 59, 66, 45, 56, 55, 40],
            borderColor: "rgba(109, 144, 232,0.8)",
            borderWidth: "1",
            backgroundColor: "rgba(109, 144, 232,0.6)",
          },
          {
            label: "My Second dataset",
            data: [28, 12, 40, 19, 63, 27, 87],
            borderColor: "rgba(255, 140, 96,0.8)",
            borderWidth: "1",
            backgroundColor: "rgba(255, 140, 96,0.6)",
          },
        ],
      },
      options: {
        legend: {
          position: "top",
          labels: {
            fontFamily: "Poppins",
            fontColor: "#9aa0ac",
          },
        },
        scale: {
          ticks: {
            beginAtZero: true,
            fontFamily: "Poppins",
            fontColor: "#9aa0ac", // Font Color
          },
        },
      },
    });
  }
} catch (error) {
  console.log(error);
}

try {
  //doughut chart
  var ctx = document.getElementById("doughut-chart");
  if (ctx) {
    ctx.height = 150;
    var myChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        datasets: [
          {
            data: [45, 25, 20, 10],
            backgroundColor: ["#735A84", "#E76412", "#9BC311", "#4E98D9"],
            hoverBackgroundColor: ["#735A84", "#E76412", "#9BC311", "#4E98D9"],
          },
        ],
        labels: ["Data 1", "Data 2", "Data 3", "Data 4"],
      },
      options: {
        legend: {
          position: "top",
          labels: {
            fontFamily: "Poppins",
            fontColor: "#9aa0ac",
          },
        },
        responsive: true,
      },
    });
  }
} catch (error) {
  console.log(error);
}

try {
  //pie chart
  var ctx = document.getElementById("pie-chart");
  if (ctx) {
    ctx.height = 200;
    var myChart = new Chart(ctx, {
      type: "pie",
      data: {
        datasets: [
          {
            data: [45, 25, 20, 10],
            backgroundColor: ["#60A3F6", "#7C59E7", "#DD6811", "#5BCFA5"],
            hoverBackgroundColor: ["#60A3F6", "#7C59E7", "#DD6811", "#5BCFA5"],
          },
        ],
        labels: ["Data 1", "Data 2", "Data 3"],
      },
      options: {
        legend: {
          position: "top",
          labels: {
            fontFamily: "Poppins",
            fontColor: "#9aa0ac",
          },
        },
        responsive: true,
      },
    });
  }
} catch (error) {
  console.log(error);
}

try {
  // polar chart
  var ctx = document.getElementById("polar-chart");
  if (ctx) {
    ctx.height = 200;
    var myChart = new Chart(ctx, {
      type: "polarArea",
      data: {
        datasets: [
          {
            data: [15, 18, 9, 6, 19],
            backgroundColor: [
              "#60A3F6",
              "#7C59E7",
              "#DD6811",
              "#5BCFA5",
              "rgba(0, 123, 255,0.5)",
            ],
          },
        ],
        labels: ["Data 1", "Data 2", "Data 3", "Data 4"],
      },
      options: {
        legend: {
          position: "top",
          labels: {
            fontFamily: "Poppins",
            fontColor: "#9aa0ac",
          },
        },
        responsive: true,
      },
    });
  }
} catch (error) {
  console.log(error);
}

// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

var bar_ctx = document.getElementById("bar-chart1").getContext("2d");

var purple_orange_gradient = bar_ctx.createLinearGradient(0, 0, 0, 600);
purple_orange_gradient.addColorStop(0, "rgba(255, 204, 128, 1)");
purple_orange_gradient.addColorStop(1, "rgba(239, 108, 0, 1)");

var bar_chart = new Chart(bar_ctx, {
  type: "bar",
  data: {
    labels: [
      "2001",
      "2002",
      "2003",
      "2004",
      "2005",
      "2006",
      "2007",
      "2008",
      "2009",
    ],
    datasets: [
      {
        label: "# of Votes",
        data: [12, 19, 3, 8, 14, 5, 9, 11, 5],
        backgroundColor: purple_orange_gradient,
        hoverBackgroundColor: purple_orange_gradient,
        hoverBorderWidth: 2,
        hoverBorderColor: "purple",
      },
    ],
  },
  options: {
    scales: {
      xAxes: [
        {
          ticks: {
            fontColor: "#9aa0ac", // Font Color
          },
        },
      ],
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
            fontColor: "#9aa0ac", // Font Color
          },
        },
      ],
    },
  },
});
