<?php
session_start();
$id=$_SESSION['userid'];
include 'db_connection.php';
include('navigationbar.html');
include('updateUserinfo.html');
$result = mysqli_query($mysqli, "SELECT u_category, SUM(u_cal) as sum FROM usercaldb where u_id='$id' GROUP BY u_category;");
echo"<center><h2>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	if($row['u_category']==0){
		echo "calorie sum of exercise ".$row['sum']."<br>";
	}
	else{
		echo "calorie sum of food ".$row['sum'];
	}
    }
} else {
    echo "0 results";
}
echo"</h2></center>";
include('mypage_favorites_buttons.html');
include 'draw_weight.php';
?>