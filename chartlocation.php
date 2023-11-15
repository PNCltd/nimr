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
            echo "['All PVs within the Period', ".intval($_SESSION["rowall"])."],\n";
		    echo "['Closed PVs within the Period', ".intval($_SESSION["rowclosed"])."],\n";
		    echo "['Open PVs within the Period', ".intval($_SESSION["rowopen"])."],\n";
		  	echo "]);"


        ?>

        var options = {
          title: 'Total Activities For the Period Selected',
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
