$(document).ready(function(){

	//*******************************************
	/*	EASY PIE CHART
	/********************************************/

	if( $('.easy-pie-chart').length > 0 ) {

		var cOptions = {
			animate: 3000,
			trackColor: "#dadada",
			scaleColor: "#dadada",
			lineCap: "square",
			lineWidth: 5,
			barColor: "#ef1e25",
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		}
		
		cOptions.barColor = "rgb(75, 75, 255)"; // blue
		$('.easy-pie-chart.blue').easyPieChart(cOptions);
		cOptions.barColor = "#3E9C1A"; // green
		$('.easy-pie-chart.green').easyPieChart(cOptions);
		cOptions.barColor = "#FFB800"; // yellow
		$('.easy-pie-chart.yellow').easyPieChart(cOptions);
		cOptions.barColor = "#E60404"; // red
		$('.easy-pie-chart.red').easyPieChart(cOptions);
	}


	//*******************************************
	/*	FLOT CHART
	/********************************************/

	if( $('.sales-chart').length > 0 ) {
		$placeholder = $('.sales-chart');
		$placeholder.attr('data-ctype', '#week');
		chartWeek($placeholder);

		// tabbed chart
		$('#sales-stat-tab a').click(function(e) {
			e.preventDefault();
		
			$chartType = $(this).attr('href');

			// remove active state
			$('#sales-stat-tab li').removeClass('active');
			$(this).parents('li').addClass('active');
			
			if($chartType == '#week') {
				chartWeek($placeholder);
			}else if($chartType == '#month') {
				chartMonth($placeholder);
			}else if($chartType == '#year') {
				chartYear($placeholder);
			}

			$placeholder.attr('data-ctype', $chartType);
		});

		var previousPoint = null;
	}

	function getRandomValues() {
		// data setup
		var values = new Array(20);

		for (var i = 0; i < values.length; i++){
			values[i] = [5 + randomVal(), 10 + randomVal(), 15 + randomVal(), 20 + randomVal(), 30 + randomVal(),
				35 + randomVal(), 40 + randomVal(), 45 + randomVal(), 50 + randomVal()]
		}

		return values;
	}


	//*******************************************
	/*	INLINE SPARKLINE WIDGET
	/********************************************/

	if( $('.sparkline-stat-item .inlinesparkline').length > 0 ) {
		var values1 = getRandomValues();
		var sparklineWidget = function() {

			var params = {
				width: '' + $('.sparkline-stat-item').width() + '',
				height: '30px',
				lineWidth: '2',
				lineColor: '#7d939a',
				fillColor: 'rgba(124,157,154, 0.1)',
				spotRadius: '2',
				highlightLineColor: '#aedaff',
				highlightSpotColor: '#71aadb',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				disableInteraction: false
			}

			$('#sparkline1').sparkline(values1[0], params);
			$('#sparkline2').sparkline(values1[1], params);
			$('#sparkline3').sparkline(values1[2], params);
			$('#sparkline4').sparkline(values1[3], params);
			$('#sparkline5').sparkline(values1[4], params);
			$('#sparkline6').sparkline(values1[5], params);
		}

		sparklineWidget();

	}

	//*******************************************
	/*	SECONDARY STAT ITEM SPARKLINE
	/********************************************/

	if( $('.secondary-stat-item .inlinesparkline').length > 0 ) {
		var values2 = getRandomValues();
		var sparklineStat = function() {

			var params = {
				width:'' + $('.secondary-stat-item').innerWidth() + '',
				height: '60px',

				spotRadius: '2',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,

				lineWidth: 1,
				lineColor: "rgba(87,90,103, 0.5)",
				fillColor: "rgba(87,90,103, 0.1)",
				highlightLineColor: '#fff',
				highlightSpotColor: '#fff',
				disableInteraction: true
			}

			$('.secondary-stat-item #spark-stat1').sparkline(values2[0], params);
			$('.secondary-stat-item #spark-stat2').sparkline(values2[1], params);
			$('.secondary-stat-item #spark-stat3').sparkline(values2[2], params);

		}
		
		sparklineStat();
	}


	//*******************************************
	/*	NUMBER-CHART SPARKLINE (Dashboard v2)
	/********************************************/

	if( $('.number-chart .inlinesparkline').length > 0 ) {

		var randomVal = getRandomValues();
		var sparklineNumberChart = function() {

			var params = {
				width: '140px',
				height: '30px',
				lineWidth: '2',
				lineColor: '#7d939a',
				fillColor: false,
				spotRadius: '2',
				highlightLineColor: '#aedaff',
				highlightSpotColor: '#71aadb',
				spotColor: false,
				minSpotColor: false,
				maxSpotColor: false,
				disableInteraction: false
			}

			$('#number-chart1').sparkline(randomVal[0], params);
			$('#number-chart2').sparkline(randomVal[1], params);
			$('#number-chart3').sparkline(randomVal[2], params);
			$('#number-chart4').sparkline(randomVal[3], params);
		}

		sparklineNumberChart();
	}

	/* sparkline on window resize */
	var sparkResize;

	$(window).resize(function(e) {
		clearTimeout(sparkResize);

		if( $('.sparkline-stat-item .inlinesparkline').length > 0 ) {
			sparkResize = setTimeout(sparklineStat, 200);
		}

		if( $('.secondary-stat-item .inlinesparkline').length > 0 ) {
			sparkResize = setTimeout(sparklineWidget, 200);
		}
	});


	//*************************************************
	/*	REAL TIME PIE CHART, CPU USAGE (Dashboard v3)
	/**************************************************/

	if( $('#cpu-usage').length > 0 ) {
			var cpuUsage = $('#cpu-usage').easyPieChart({
				size: 130,
				barColor: function(percent) {
					return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
				},
				trackColor: 'rgba(73, 73, 73, 0.2)',
				scaleColor: false,
				lineWidth: 5,
				lineCap: "square",
				animate: 800
			});

			var updateInterval = 3000; // in milliseconds

			setInterval( function() {
				var randomVal;
				randomVal = getRandomInt(0, 100);

				cpuUsage.data('easyPieChart').update(randomVal);
				cpuUsage.find('.percent').text(randomVal);
			}, updateInterval);

			function getRandomInt(min, max) {
				return Math.floor(Math.random() * (max - min + 1)) + min;
			}
	}


	//*******************************************
	/*	MINI PIE CHART
	/********************************************/

	if( $('.mini-pie-chart').length > 0 ) {
		var visitData = [[30, 15, 55], [65, 25, 10], [55, 15, 30], [25, 25, 50], [40, 35, 25], [70, 15, 15], [15, 25, 60]];
		var params = {
			type: "pie",
			sliceColors: ["#7d939a", "#5399D6", "#d7ea2b"],
		}

		$('#mini-pie-chart1').sparkline(visitData[0], params);
		$('#mini-pie-chart2').sparkline(visitData[1], params);
		$('#mini-pie-chart3').sparkline(visitData[2], params);
		$('#mini-pie-chart4').sparkline(visitData[3], params);
		$('#mini-pie-chart5').sparkline(visitData[4], params);
		$('#mini-pie-chart6').sparkline(visitData[5], params);
		$('#mini-pie-chart7').sparkline(visitData[6], params);
	}


	//*******************************************
	/*	MINI BAR CHART
	/********************************************/

	if( $('.mini-bar-chart').length > 0 ) {
		var values = getRandomValues();
		var params = {
			type: 'bar',
			barWidth: 5,
			height: 25
		}

		params.barColor = '#CE7B11';
		$('#mini-bar-chart1').sparkline(values[0], params);
		params.barColor = '#1D92AF';
		$('#mini-bar-chart2').sparkline(values[1], params);
		params.barColor = '#3F7577';
		$('#mini-bar-chart3').sparkline(values[2], params);
	}


	//*******************************************
	/*	DONUT CHART
	/********************************************/

	if( $('#visit-chart, #demo-donut-chart').length > 0 ) {
		var data = [
			{ label: "Direct",  data: 65},
			{ label: "Referral",  data: 20},
			{ label: "Others", data: 15}
		];

		$.plot('#visit-chart, #demo-donut-chart', data, {
			series: {
				pie: {
					show: true,
					innerRadius: .4,
					stroke: {
						width: 4,
						color: "#F9F9F9"
					},
					label: {
						show: true,
						radius: 3/4,
						formatter: donutLabelFormatter
					}
				},
			},
			legend: {
				show: false
			},
			grid: {
				hoverable: true
			},
			colors: ["#7d939a", "#5399D6", "#d7ea2b"],
		});
	}

	if( $('#investment-donut-chart').length > 0 ) {
		var data = [
			{ label: "Stock",  data: 55},
			{ label: "Mutual Fund",  data: 8},
			{ label: "Fixed Assets", data: 18},
			{ label: "Forex", data: 12},
			{ label: "Others", data: 7}
		];

		$.plot('#investment-donut-chart', data, {
			series: {
				pie: {
					show: true,
					//innerRadius: 0,
					stroke: {
						width: 0,
						color: "#F9F9F9"
					},
					label: {
						show: true,
						radius: 3/4,
						formatter: donutLabelFormatter
					}
				},
			},
			legend: {
				show: false
			},
			grid: {
				hoverable: true
			},
			colors: ["#f98114", "#88f914", "#f91465", "#1461f9", "#f9d614"],
		});
	}


	//*******************************************
	/*	CHART AND STAT DEMO PAGE
	/********************************************/

	if( $('#demo-line-chart').length > 0 ) 
		chartYear( $('#demo-line-chart') );
	if( $('#demo-area-chart').length > 0 )
		chartWeek( $('#demo-area-chart') );
	if( $('#demo-vertical-bar-chart').length > 0 )
		chartBarVertical( $('#demo-vertical-bar-chart') );
	if( $('#demo-horizontal-bar-chart').length > 0 )
		chartBarHorizontal( $('#demo-horizontal-bar-chart') );
	if( $('#demo-multi-types-chart').length > 0 )
		chartMonth( $('#demo-multi-types-chart') );

	

	if( $('#demo-select-zoom-chart').length > 0 ) {
		chartSelectZoomSeries( $('#demo-select-zoom-chart') );
	}

	/* real-time chart demo */
	if ( $('#demo-real-time-chart').length > 0  ) {
		chartRealtTime($('#demo-real-time-chart'), "bar");
	}

	/* javascript helper functions */
	function showTooltip(x, y, contents) {

		$("<div id='tooltip' class='flot-tooltip'>" + contents + "</div>").css({
			top: y + 5,
			left: x + 5,
		}).appendTo("body").fadeIn(200);
	}

	// get day function
	function gt(y, m, d) {
		return new Date(y, m-1, d).getTime();
	}

	function donutLabelFormatter(label, series) {
		return "<div class=\"donut-label\">" + label + "<br/>" + Math.round(series.percent) + "%</div>";
	}

	function randomVal(){
		return Math.floor( Math.random() * 80 );
	}


	

	
	
	
	
	
	$('.btn-change-chart').click( function(){
		plotOptions.series.lines = {
			fill: true,
			fillColor: "#92D135"
		};

		plotOptions.colors = ["#72AC1C"];

	});

	if( $('#select-chart-type').length > 0) {
		$('#select-chart-type').multiselect({
			dropRight: true
		});

		$('#select-chart-type').change( function() {

			var chartType = $(this).val();

			if( chartType == 'area' ) {
				plotOptions.series.bars = {
					show: false,
				}

				plotOptions.series.lines = {
					fill: true,
					fillColor: "#92D135"
				};
				plotOptions.colors = ["#72AC1C"];

			}else if( chartType == 'bar') {
				plotOptions.series.bars = {
					show: true,
					barWidth: 1,
					fill: false,
				}
				plotOptions.colors = ["#F30"];

			}else if( chartType == 'line' ) {
				plotOptions.series.bars = {
					show: false,
				}

				plotOptions.series.lines = {
					fill: false,
				};
				plotOptions.colors = ["#5399D6"];

			}

		});
	}

}); // end ready function