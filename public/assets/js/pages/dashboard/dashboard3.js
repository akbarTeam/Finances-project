'use strict';
$(function () {
	initCharts();
});
//Charts
function initCharts() {
	//Chart Bar
	$('.chart.chart-bar').sparkline([6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5, 6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5], {
		type: 'bar',
		barColor: '#fff',
		negBarColor: '#fff',
		barWidth: '4px',
		height: '45px'
	});


	//Chart Pie
	$('.chart.chart-pie').sparkline([30, 35, 25, 8], {
		type: 'pie',
		height: '45px',
		sliceColors: ['rgba(255,255,255,0.70)', 'rgba(255,255,255,0.85)', 'rgba(255,255,255,0.95)', 'rgba(255,255,255,1)']
	});


	//Chart Line
	$('.chart.chart-line').sparkline([9, 4, 6, 5, 6, 4, 7, 3], {
		type: 'line',
		width: '60px',
		height: '45px',
		lineColor: '#fff',
		lineWidth: 1.3,
		fillColor: 'rgba(0,0,0,0)',
		spotColor: 'rgba(255,255,255,0.40)',
		maxSpotColor: 'rgba(255,255,255,0.40)',
		minSpotColor: 'rgba(255,255,255,0.40)',
		spotRadius: 3,
		highlightSpotColor: '#fff'
	});


	try {
		// polar chart
		var ctx = document.getElementById("radar-chart");
		if (ctx) {
			ctx.height = 150;
			var myChart = new Chart(ctx, {
				type: 'radar',
				data: {
					labels: [
						["Eating", "Dinner"],
						["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"
					],
					defaultFontFamily: 'Poppins',
					datasets: [{
							label: "My First dataset",
							data: [65, 59, 66, 45, 56, 55, 40],
							borderColor: "rgba(244, 67, 54, 0.6)",
							borderWidth: "1",
							backgroundColor: "rgba(244, 67, 54, 0.4)"
						},
						{
							label: "My Second dataset",
							data: [28, 12, 40, 19, 63, 27, 87],
							borderColor: "rgba(239, 81, 6, 0.7",
							borderWidth: "1",
							backgroundColor: "rgba(239, 81, 6, 0.5)"
						}
					]
				},
				options: {
					legend: {
						position: 'top',
						labels: {
							fontFamily: 'Poppins',
							fontColor: "#9aa0ac", // Font Color
						}

					},
					scale: {
						ticks: {
							beginAtZero: true,
							fontFamily: "Poppins"
						}
					}
				}
			});
		}
	} catch (error) {
		console.log(error);
	}

	try {

		var ctx = document.getElementById("line-chart2");
		if (ctx) {
			ctx.height = 150;
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
					type: 'line',
					defaultFontFamily: 'Poppins',
					datasets: [{
						label: "Foods",
						data: [4, 20, 10, 70, 50, 63, 10],
						backgroundColor: 'transparent',
						borderColor: '#78CEFF',
						borderWidth: 3,
						pointStyle: 'circle',
						pointRadius: 4,
						pointBorderColor: 'transparent',
						pointBackgroundColor: '#78CEFF',
					}, {
						label: "Electronics",
						data: [6, 40, 40, 20, 40, 79, 30],
						backgroundColor: 'transparent',
						borderColor: '#FFBE4E',
						borderWidth: 3,
						pointStyle: 'circle',
						pointRadius: 4,
						pointBorderColor: 'transparent',
						pointBackgroundColor: '#FFBE4E',
					}]
				},
				options: {
					responsive: true,
					tooltips: {
						mode: 'index',
						titleFontSize: 12,
						titleFontColor: '#000',
						bodyFontColor: '#000',
						backgroundColor: '#fff',
						titleFontFamily: 'Poppins',
						bodyFontFamily: 'Poppins',
						cornerRadius: 3,
						intersect: false,
					},
					legend: {
						display: false,
						labels: {
							usePointStyle: true,
							fontFamily: 'Poppins',
						},
					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								display: false,
								drawBorder: false
							},
							scaleLabel: {
								display: false,
								labelString: 'Month'
							},
							ticks: {
								fontFamily: "Poppins",
								fontColor: "#9aa0ac", // Font Color
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								display: false,
								drawBorder: false
							},
							scaleLabel: {
								display: true,
								labelString: 'Value',
								fontFamily: "Poppins"

							},
							ticks: {
								fontFamily: "Poppins",
								fontColor: "#9aa0ac", // Font Color
							}
						}]
					},
					title: {
						display: false,
						text: 'Normal Legend'
					}
				}
			});
		}

	} catch (error) {
		console.log(error);
	}
}