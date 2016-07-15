<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('number', 'Guardians of the Galaxy');

      data.addRows([
        [1,  41.8],
        [2,  32.4],
        [3,  25.7],
        [4,  10.5],
        [5,  10.4],
        [6,   7.7],
        [7,   9.6],
        [8,  10.6],
        [9,  14.8],
        [10, 11.6],
        [11,  4.7],
        [12,  5.2],
        [13,  3.6],
        [14,  3.4]
      ]);

      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
        },
        width: 900,
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
     <button id="change-chart">Change to Classic</button>
  <br><br>
  <div id="chart_div"></div>
  </body>
</html>