<html>
  <head>
<!--    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
        <script type="text/javascript" src="gstatic/loader.js"></script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

	  <?php 
		    
		  	echo "['Task', 'Hours per Day'],\n";
            echo "['Open Issues', ".intval($_SESSION["open_issue"])."],\n";
		    echo "['Closed Issues', ".intval($_SESSION["closed_issue"])."],\n";
		    echo "['Assigned Issues', ".intval($_SESSION["assigned_issue"])."],\n";
		  	echo "['Unassigned Issues', ".intval($_SESSION["unassigned_issue"])."],\n";
		  	echo "]);"


        ?>

        var options = {
          title: 'Total Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    <div align="center" style="color: red"><strong>Performance is <?php echo  round((intval($_SESSION["closed_issue"])/(intval($_SESSION["assigned_issue"])+ intval($_SESSION["unassigned_issue"])))*100,2) ?>% </strong></div>
  </body>
</html>
