s$(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  //- MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
      {
        label: "Electronics",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: [65, 59, 80, 81, 56, 55, 40]
      },
      {
        label: "Digital Goods",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [28, 48, 40, 19, 86, 27, 90]
      }
    ]
  };

  var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: 700,
      color: "#f56954",
      highlight: "#f56954",
      label: "Chrome"
    },
    {
      value: 500,
      color: "#00a65a",
      highlight: "#00a65a",
      label: "IE"
    },
    {
      value: 400,
      color: "#f39c12",
      highlight: "#f39c12",
      label: "FireFox"
    },
    {
      value: 600,
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Safari"
    },
    {
      value: 300,
      color: "#3c8dbc",
      highlight: "#3c8dbc",
      label: "Opera"
    },
    {
      value: 100,
      color: "#d2d6de",
      highlight: "#d2d6de",
      label: "Navigator"
    }
  ];
  var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=value %> <%=label%> users"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  //-----------------
  //- END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').vectorMap({
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: false,
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(210, 214, 222, 1)',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      },
      hover: {
        "fill-opacity": 0.7,
        cursor: 'pointer'
      },
      selected: {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle: {
      initial: {
        fill: '#00a65a',
        stroke: '#111'
      }
    },
    markers: [
      {latLng: [41.90, 12.45], name: 'Vatican City'},
      {latLng: [43.73, 7.41], name: 'Monaco'},
      {latLng: [-0.52, 166.93], name: 'Nauru'},
      {latLng: [-8.51, 179.21], name: 'Tuvalu'},
      {latLng: [43.93, 12.46], name: 'San Marino'},
      {latLng: [47.14, 9.52], name: 'Liechtenstein'},
      {latLng: [7.11, 171.06], name: 'Marshall Islands'},
      {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
      {latLng: [3.2, 73.22], name: 'Maldives'},
      {latLng: [35.88, 14.5], name: 'Malta'},
      {latLng: [12.05, -61.75], name: 'Grenada'},
      {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
      {latLng: [13.16, -59.55], name: 'Barbados'},
      {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
      {latLng: [-4.61, 55.45], name: 'Seychelles'},
      {latLng: [7.35, 134.46], name: 'Palau'},
      {latLng: [42.5, 1.51], name: 'Andorra'},
      {latLng: [14.01, -60.98], name: 'Saint Lucia'},
      {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
      {latLng: [1.3, 103.8], name: 'Singapore'},
      {latLng: [1.46, 173.03], name: 'Kiribati'},
      {latLng: [-21.13, -175.2], name: 'Tonga'},
      {latLng: [15.3, -61.38], name: 'Dominica'},
      {latLng: [-20.2, 57.5], name: 'Mauritius'},
      {latLng: [26.02, 50.55], name: 'Bahrain'},
      {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
    ]
  });

  /* SPARKLINE CHARTS
   * ----------------
   * Create a inline charts with spark line
   */

  //-----------------
  //- SPARKLINE BAR -
  //-----------------
  $('.sparkbar').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type: 'bar',
      height: $this.data('height') ? $this.data('height') : '30',
      barColor: $this.data('color')
    });
  });

  //-----------------
  //- SPARKLINE PIE -
  //-----------------
  var api = {};
  (function() {
    function buildSVGElement(type) {
      return document.createElementNS("http://www.w3.org/2000/svg", type);
    }

    function buildChart(size) {
      var chart = buildSVGElement("svg:svg");

      chart.setAttribute("width", size);
      chart.setAttribute("height", size);
      chart.setAttribute("viewBox", "0 0 " + size + " " + size);
      return chart;
    }

    function buildBackground(size) {
      var color = "#EBEBEB",
          bg = buildSVGElement("circle");

      bg.setAttributeNS(null, "cx", size / 2);
      bg.setAttributeNS(null, "cy", size / 2);
      bg.setAttributeNS(null, "r", size / 2);
      bg.setAttributeNS(null, "fill", color);
      return bg;
    }

    function buildHole(size) {
      var hole = buildSVGElement("circle");
      hole.setAttributeNS(null, "cx", (size / 2));
      hole.setAttributeNS(null, "cy", (size / 2));
      hole.setAttributeNS(null, "r", (size * 0.4));
      hole.setAttributeNS(null, "fill", '#fff');
      return hole;
    }

    function buildValue(size, percentage, color) {
      var d,
          path = buildSVGElement("path"),
          unit = (Math.PI * 2) / 100,
          startAngle = 0,
          endAngle = percentage * unit - 0.001,
          x1 = (size / 2) + (size / 2) * Math.sin(startAngle),
          y1 = (size / 2) - (size / 2) * Math.cos(startAngle),
          x2 = (size / 2) + (size / 2) * Math.sin(endAngle),
          y2 = (size / 2) - (size / 2) * Math.cos(endAngle),
          direction = 0;

      if (endAngle - startAngle > Math.PI) {
        direction = 1;
      }

      d = "M " + (size / 2) + "," + (size / 2) + // Start at circle center
        " L " + x1 + "," + y1 + // Draw line to (x1,y1)
        " A " + (size / 2) + "," + (size / 2) + // Draw an arc of radius r
        " 0 " + direction + " 1 " + // Arc details...
        x2 + "," + y2 + // Arc goes to to (x2,y2)
        " Z"; // Close path back to (cx,cy)

      path.setAttribute("d", d);
      path.setAttribute("fill", color);
      return path;
    }

    api.donutChart = function(percentage, size, color) {
      color = color || '#f05f3b';
      var chart = buildChart(size),
          bg = buildBackground(size),
          value = buildValue(size, percentage, color),
          front = buildHole(size);

      chart.appendChild(bg);
      chart.appendChild(value);
      chart.appendChild(front);

      return chart;
    }

    api.pieChart = function (percentage, size, color) {
      color = color || '#f05f3b';
      var chart = buildChart(size),
          bg = buildBackground(size),
          value = buildValue(size, percentage, color);

      chart.appendChild(bg);
      chart.appendChild(value);

      return chart;
    }
  }());

  (function buildDonutCharts () {
    var container = document.getElementById('donut-container');
    container.appendChild(api.donutChart(95, 20, 'red'));
    container.appendChild(api.donutChart(33, 30));
    container.appendChild(api.donutChart(66, 40, 'black'));
    container.appendChild(api.donutChart(85, 50, 'green'));

    container.appendChild(api.donutChart(1, 70, 'skyblue'));
    container.appendChild(api.donutChart(50, 70, 'blue'));
    container.appendChild(api.donutChart(25, 70, 'purple'));
    container.appendChild(api.donutChart(99, 70, 'magenta'));
    container.appendChild(api.donutChart(100, 70, 'orange'));
  } ());

  (function buildPieCharts () {
    var container = document.getElementById('pie-container');
    container.appendChild(api.pieChart(95, 20, 'red'));
    container.appendChild(api.pieChart(33, 30));
    container.appendChild(api.pieChart(66, 40, 'black'));
    container.appendChild(api.pieChart(85, 50, 'green'));

    container.appendChild(api.pieChart(1, 70, 'skyblue'));
    container.appendChild(api.pieChart(50, 70, 'blue'));
    container.appendChild(api.pieChart(25, 70, 'purple'));
    container.appendChild(api.pieChart(99, 70, 'magenta'));
    container.appendChild(api.pieChart(100, 70, 'orange'));
  } ());
  $('.sparkline').each(function () {
    var $this = $(this);
    $this.sparkline('html', {
      type: 'line',
      height: $this.data('height') ? $this.data('height') : '90',
      width: '100%',
      lineColor: $this.data('linecolor'),
      fillColor: $this.data('fillcolor'),
      spotColor: $this.data('spotcolor')
    });
  });
});
