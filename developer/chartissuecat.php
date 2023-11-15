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
            echo "['Network', ".intval($_SESSION["network"])."],\n";
		    echo "['Hardware', ".intval($_SESSION["hardware"])."],\n";
		    echo "['Operating System', ".intval($_SESSION["OS"])."],\n";
			echo "['Email', ".intval($_SESSION["email"])."],\n";
			echo "['Application', ".intval($_SESSION["application"])."],\n";
		    echo "['Unassigned', ".intval($_SESSION["unassigned"])."],\n";
		    echo "['Others', ".intval($_SESSION["others"])."],\n";

		  	echo "]);"


        ?>

        var options = {
          title: 'Total Activities For the Period Selected',
          is3D: true,
		pieSliceText: 'value-and-percentage',// This displays the values of the chart
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>