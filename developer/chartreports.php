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
            //echo "['All Issues', ".intval($_SESSION["rowall"])."],\n";
		    echo "['Closed Issues', ".intval($_SESSION["rowclosed"])."],\n";
		    echo "['Open Issues', ".intval($_SESSION["rowopen"])."],\n";
		    echo "['Assigned Issues', ".intval($_SESSION["assigned"])."],\n";
		    echo "['Unassigned Issues', ".intval($_SESSION["unassigned"])."],\n";
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
    <div align="center" style="color: red"><strong>Performance is <?php echo  round((intval($_SESSION["rowclosed"])/(intval($_SESSION["rowall"])))*100,2) ?>% </strong></div>
  </body>
</html>
