<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<body >
<?php
require "db_connection.php";// Database connection
$id=$_SESSION[userid];
if($stmt = $mysqli->query("SELECT u_date, u_weight, u_calSum FROM userinfodb WHERE u_id='$id'")){
echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
  echo "<center><table>
<tr> <th>Days</th><th>Weight</th><th>Calorie</th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table></center>";
}else{
echo $mysqli->error;
}
echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>

<center><div id="curve_chart"></div></center>
<br><br>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Days');
        data.addColumn('number', 'Weight');
        data.addColumn('number', 'Calorie');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]),parseInt(my_2d[i][2])]);
       var options = {
          title: 'Weight & Calorie per Day',
        curveType: 'function',
		width: 800,
        height: 500,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
       }

</script>
</body></html>







