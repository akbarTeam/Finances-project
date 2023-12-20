'use strict';
$(function () {


	$('#chat-conversation').slimscroll({
		height: '264px',
		size: '5px'
	});
	initCardChart();
	initSparkline();
	initLineChart();
	initSalesChart();

	initChartReport1();
	initChartReport2();
});

function initCardChart() {


	//Chart Bar
	$('.chart.chart-bar').sparkline([6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5, 6, 4, 8, 6, 8, 10, 5, 6, 7, 9, 5], {
		type: 'bar',
		barColor: '#FF9800',
		negBarColor: '#fff',
		barWidth: '4px',
		height: '45px'
	});


	//Chart Pie
	$('.chart.chart-pie').sparkline([30, 35, 25, 8], {
		type: 'pie',
		height: '45px',
		sliceColors: ['#65BAF2', '#F39517', '#F44586', '#6ADF42']
	});


	//Chart Line
	$('.chart.chart-line').sparkline([9, 4, 6, 5, 6, 4, 7, 3], {
		type: 'line',
		width: '60px',
		height: '45px',
		lineColor: '#65BAF2',
		lineWidth: 2,
		fillColor: 'rgba(0,0,0,0)',
		spotColor: '#F39517',
		maxSpotColor: '#F39517',
		minSpotColor: '#F39517',
		spotRadius: 3,
		highlightSpotColor: '#F44586'
	});

	// live chart
	var mrefreshinterval = 500; // update display every 500ms
	var lastmousex = -1;
	var lastmousey = -1;
	var lastmousetime;
	var mousetravel = 0;
	var mpoints = [];
	var mpoints_max = 30;
	$('html').on("mousemove", function (e) {
		var mousex = e.pageX;
		var mousey = e.pageY;
		if (lastmousex > -1) {
			mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
		}
		lastmousex = mousex;
		lastmousey = mousey;
	});
	var mdraw = function () {
		var md = new Date();
		var timenow = md.getTime();
		if (lastmousetime && lastmousetime != timenow) {
			var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
			mpoints.push(pps);
			if (mpoints.length > mpoints_max)
				mpoints.splice(0, 1);
			mousetravel = 0;
			$('#liveChart').sparkline(mpoints, {
				width: mpoints.length * 2,
				height: '45px',
				tooltipSuffix: ' pixels per second'
			});
		}
		lastmousetime = timenow;
		setTimeout(mdraw, mrefreshinterval);
	};
	// We could use setInterval instead, but I prefer to do it this way
	setTimeout(mdraw, mrefreshinterval);
}
function initChartReport1() {
	var canvas = document.getElementById("chartReport1");
	// Apply multiply blend when drawing datasets
	var multiply = {
		beforeDatasetsDraw: function (chart, options, el) {
			chart.ctx.globalCompositeOperation = 'multiply';
		},
		afterDatasetsDraw: function (chart, options) {
			chart.ctx.globalCompositeOperation = 'source-over';
		},
	};

	// Gradient color - this week
	var gradientThisWeek = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientThisWeek.addColorStop(0, '#5555FF');
	gradientThisWeek.addColorStop(1, '#9787FF');

	// Gradient color - previous week
	var gradientPrevWeek = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientPrevWeek.addColorStop(0, '#FF55B8');
	gradientPrevWeek.addColorStop(1, '#FF8787');


	var config = {
		type: 'line',
		data: {
			labels: ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
			datasets: [
				{
					label: 'This week',
					data: [24, 18, 16, 18, 24, 36, 28],
					backgroundColor: gradientThisWeek,
					borderColor: 'transparent',
					pointBackgroundColor: '#FFFFFF',
					pointBorderColor: '#FFFFFF',
					lineTension: 0.40,
				},
				{
					label: 'Previous week',
					data: [20, 22, 30, 22, 18, 22, 30],
					backgroundColor: gradientPrevWeek,
					borderColor: 'transparent',
					pointBackgroundColor: '#FFFFFF',
					pointBorderColor: '#FFFFFF',
					lineTension: 0.40,
				}
			]
		},
		options: {
			elements: {
				point: {
					radius: 0,
					hitRadius: 5,
					hoverRadius: 5
				}
			},
			legend: {
				display: false,
			},
			scales: {
				xAxes: [{
					display: false,
				}],
				yAxes: [{
					display: false,
					ticks: {
						beginAtZero: true,
					},
				}]
			}
		},
		plugins: [multiply],
	};

	window.chart = new Chart(canvas, config);
}
function initChartReport2() {
	var canvas = document.getElementById("chartReport2");

	var gradientBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientBlue.addColorStop(0, 'rgba(85, 85, 255, 0.9)');
	gradientBlue.addColorStop(1, 'rgba(151, 135, 255, 0.8)');

	var gradientHoverBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientHoverBlue.addColorStop(0, 'rgba(65, 65, 255, 1)');
	gradientHoverBlue.addColorStop(1, 'rgba(131, 125, 255, 1)');

	var gradientRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientRed.addColorStop(0, 'rgba(255, 85, 184, 0.9)');
	gradientRed.addColorStop(1, 'rgba(255, 135, 135, 0.8)');

	var gradientHoverRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
	gradientHoverRed.addColorStop(0, 'rgba(255, 65, 164, 1)');
	gradientHoverRed.addColorStop(1, 'rgba(255, 115, 115, 1)');

	var redArea = null;
	var blueArea = null;

	var shadowed = {
		beforeDatasetsDraw: function (chart, options) {
			chart.ctx.shadowColor = 'rgba(0, 0, 0, 0.25)';
			chart.ctx.shadowBlur = 40;
		},
		afterDatasetsDraw: function (chart, options) {
			chart.ctx.shadowColor = 'rgba(0, 0, 0, 0)';
			chart.ctx.shadowBlur = 0;
		}
	};


	window.chart = new Chart(document.getElementById("chartReport2"), {
		type: "radar",
		data: {
			labels: ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"],
			datasets: [{
				label: "Product",
				data: [25, 59, 90, 81, 60, 82, 52],
				fill: true,
				backgroundColor: gradientRed,
				borderColor: 'transparent',
				pointBackgroundColor: "transparent",
				pointBorderColor: "transparent",
				pointHoverBackgroundColor: "transparent",
				pointHoverBorderColor: "transparent",
				pointHitRadius: 50,
			}, {
				label: "Services",
				data: [40, 100, 40, 90, 40, 90, 84],
				fill: true,
				backgroundColor: gradientBlue,
				borderColor: "transparent",
				pointBackgroundColor: "transparent",
				pointBorderColor: "transparent",
				pointHoverBackgroundColor: "transparent",
				pointHoverBorderColor: "transparent",
				pointHitRadius: 50,
			}]
		},
		options: {
			legend: {
				display: false,
			},
			gridLines: {
				display: false
			},
			scale: {
				ticks: {
					maxTicksLimit: 1,
					display: false,
				}
			}
		},
		plugins: [shadowed]
	});

}
function initSparkline() {
	$(".sparkline").each(function () {
		var $this = $(this);
		$this.sparkline('html', $this.data());
	});
}

function initLineChart() {
	try {

		//line chart
		var ctx = document.getElementById("lineChart");
		if (ctx) {
			ctx.height = 150;
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July"],
					defaultFontFamily: "Poppins",
					datasets: [
						{
							label: "My First dataset",
							borderColor: "rgba(0,0,0,.09)",
							borderWidth: "1",
							backgroundColor: "rgba(0,0,0,.07)",
							data: [22, 44, 67, 43, 76, 45, 12]
						},
						{
							label: "My Second dataset",
							borderColor: "rgba(0, 123, 255, 0.9)",
							borderWidth: "1",
							backgroundColor: "rgba(0, 123, 255, 0.5)",
							pointHighlightStroke: "rgba(26,179,148,1)",
							data: [16, 32, 18, 26, 42, 33, 44]
						}
					]
				},
				options: {
					legend: {
						position: 'top',
						labels: {
							fontFamily: 'Poppins'
						}

					},
					responsive: true,
					tooltips: {
						mode: 'index',
						intersect: false
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							ticks: {
								fontFamily: "Poppins"

							}
						}],
						yAxes: [{
							ticks: {
								beginAtZero: true,
								fontFamily: "Poppins"
							}
						}]
					}

				}
			});
		}


	} catch (error) {
		console.log(error);
	}
}

function initSalesChart() {

	try {
		//Sales chart
		var ctx = document.getElementById("sales-chart");
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
						data: [0, 30, 10, 120, 50, 63, 10],
						backgroundColor: 'transparent',
						borderColor: '#222222',
						borderWidth: 2,
						pointStyle: 'circle',
						pointRadius: 3,
						pointBorderColor: 'transparent',
						pointBackgroundColor: '#222222',
					}, {
						label: "Electronics",
						data: [0, 50, 40, 80, 40, 79, 120],
						backgroundColor: 'transparent',
						borderColor: '#f96332',
						borderWidth: 2,
						pointStyle: 'circle',
						pointRadius: 3,
						pointBorderColor: 'transparent',
						pointBackgroundColor: '#f96332',
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
								fontFamily: "Poppins"
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
								fontFamily: "Poppins"
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
